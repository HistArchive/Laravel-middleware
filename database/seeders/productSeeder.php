<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(10)->create();
        
       /* DB::table('products')->insert([
            [
                'name'=>'Producto 1',
                'description'=>'Descripcion producto 5',
                'descriptionlong'=>'Descdesc',
                'price'=> 158.9,
                'category_id'=>1
                
            ],
            [
                'name'=>'Producto 2',
                'description'=>'Descripcion producto 6',
                'descriptionlong'=>'Descdesc',
                'price'=> 186.9,
                'category_id'=>2
            ], [
                'name'=>'Producto 3',
                'description'=>'Descripcion producto 6',
                'descriptionlong'=>'Descdesc',
                'price'=> 186.93,
                'category_id'=>2
            ],[
                'name'=>'Producto 4',
                'description'=>'Descripcion producto 6',
                'descriptionlong'=>'Descdesc',
                'price'=> 186.9,
                'category_id'=>1
            ],[
                'name'=>'Producto 5',
                'description'=>'Descripcion producto 6',
                'descriptionlong'=>'Descdesc',
                'price'=> 186.9,
                'category_id'=>2
            ]
            ]);
 
        DB::table('products')->truncate(); eliminar datos */

       
    }
}
