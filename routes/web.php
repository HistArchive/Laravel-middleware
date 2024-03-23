<?php
use App\Http\Controllers\ctrl_bienvenida;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductControl;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['mantenimiento']], function() {
    Route::get('/', function() {
        return view('welcome');
    });

    Route::resource('/productos', ProductControl::class);
    
    Route::resource('/productos', ProductControl::class);
    Route::get('/productos/create', [ProductControl::class, 'create']);
    Route::resource('/productos', ProductControl::class);
    Route::post('/productos', [ProductControl::class, 'store']);
    Route::get('/productos/{id}', [ProductControl::class, 'show']);
    Route::put('/productos/{id}', [ProductControl::class, 'update']);
    Route::delete('/productos/{id}', [ProductControl::class, 'destroy']);
});

Route::get('/mantenimiento', function() {
    return view('mantenimiento');
});

