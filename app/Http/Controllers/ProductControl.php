<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductControl extends Controller
{
    public static function index(){
        return view('Product.index', [
            'products' => Product::with('category')
                ->whereHas('category', function($query) {
                    $query->where('Estado', 1);
                })
                ->orderBy('id', 'ASC')
                ->get(),
            'categories' => Category::all()
        ]);        
    }
    public static function store(Request $request){
        $rules = [
            'NombreAg' => 'required|string|max:255',
            'DescAg' => 'required|string|max:255',
            'DLAg' => 'required|string|max:255',
            'CateAg' => 'required|exists:categories,id',
            'precioAg' => 'required|numeric|min:0',
        ];
    
        
        $validator = Validator::make($request->all(), $rules);
    
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
   
        $product = new Product();
        $product->name = $request->input('NombreAg');
        $product->description = $request->input('DescAg');
        $product->descriptionLong = $request->input('DLAg');
        $product->category_id = $request->input('CateAg');
        $product->price = $request->input('precioAg');
        $product->save();
        return redirect('/productos')->with('success', 'Producto añadido existosamente');
    }
    public static function show($id){
        $products = Product::findOrFail($id);
        return response()->json($products);   
    }
    public static function update(Request $request, $id){
        $product = Product::findOrFail($id);

        $rules = [
            'NombreEd' => 'required|string|max:255',
            'DescEd' => 'required|string|max:255',
            'DLEd' => 'required|string|max:255',
            'CateEd' => 'required|exists:categories,id',
            'precioEd' => 'required|numeric|min:0',
        ];
    
        
        $validator = Validator::make($request->all(), $rules);
    
      
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product->name = $request->input('NombreEd');
        $product->description = $request->input('DescEd');
        $product->descriptionLong = $request->input('DLEd');
        $product->category_id = $request->input('CateEd');
        $product->price = $request->input('precioEd');
        $product->save();
        return redirect('/productos')->with('success', 'Tu producto ha sido actualizado');
    }
    public static function destroy($id){
        try {
            $product = Product::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect('/productos')->with('error', 'Producto no encontrado');
        }
        // Si se encuentra, deshabilitamos el producto
        $success = $product->update(['Estado' => 0]);
        if ($success) {
            // Fue bien
            return redirect('/productos')->with('error', $product->name . ' ha sido deshabilitado');
        } else {
            // Mal
            return redirect('/productos')->with('error', 'Ha habido un error al deshabilitar el producto, por favor intenta de nuevo');
        }

    }
}
