<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ProveedorController;


//Route::resource('categorias', CategoriaController::class)->names('categorias.index');
Route::resource('categorias',CategoriaController::class)->names('admin.categorias');

//Route::resource('productos', ProductoController::class)->names('repuestos.index');
Route::resource('productos',ProductoController::class)->names('admin.productos');
Route::resource('proveedores',ProveedorController::class)->names('admin.proveedor');

// Route::get('/categorias/index', [CategoriaController::class, 'index']);
// Route::get('/productos/index', [ProductoController::class, 'index']);
// Route::post('/categorias/crear', [CategoriaController::class, 'create']);
// Route::post('/productos/crear', [ProductoController::class, 'create']);
// Route::post('/categorias/store', [CategoriaController::class, 'store']);
// Route::post('/productos/store', [ProductoController::class, 'store']);