<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ProveedorController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NotaingresoController;
use App\Http\Controllers\Admin\DetalleingresoController;


Route::resource('usuarios', UserController::class)->only(['index', 'create', 'edit', 'update', 'store', 'destroy'])->except('show')->names('admin.usuarios');
Route::resource('categorias',CategoriaController::class)->names('admin.categorias');

//Route::resource('productos', ProductoController::class)->names('repuestos.index');
Route::resource('productos',ProductoController::class)->names('admin.productos');
Route::resource('proveedores',ProveedorController::class)->names('admin.proveedor');

Route::resource('users', AdminUserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('roles', RolController::class)->names('admin.roles');

//para la nota de ingreso de materiales 
Route::resource('notaingreso', NotaingresoController::class)->names('admin.notaingreso');//listar todas las notas de salidas

Route::resource('detallesingreso', DetalleingresoController::class)->names('admin.detallesingreso');

