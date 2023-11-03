<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ProveedorController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\UserController;

Route::resource('usuarios', UserController::class)->only(['index', 'create', 'edit', 'update', 'store', 'destroy'])->except('show')->names('admin.usuarios');

Route::resource('categorias',CategoriaController::class)->names('admin.categorias');

Route::resource('productos',ProductoController::class)->names('admin.productos');

Route::resource('proveedores',ProveedorController::class)->names('admin.proveedor');

Route::resource('roles', RolController::class)->names('admin.roles');

//Route::resource('productos', ProductoController::class)->names('repuestos.index');
