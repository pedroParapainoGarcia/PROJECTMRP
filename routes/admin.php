<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ProveedorController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NotaingresoController;
use App\Http\Controllers\Admin\DetalleingresoController;
use App\Http\Controllers\Admin\LoteController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\Admin\ReporteController;
use App\Livewire\MetodoPago;
use App\Livewire\Suscripciones;

Route::resource('usuarios', UserController::class)->only(['index', 'create', 'edit', 'update', 'store', 'destroy'])->except('show')->names('admin.usuarios');

Route::resource('categorias',CategoriaController::class)->except('show')->names('admin.categorias');

Route::resource('productos',ProductoController::class)->except('show')->names('admin.productos');

Route::resource('roles', RolController::class)->names('admin.roles');

Route::resource('proveedores',ProveedorController::class)->except('show')->names('admin.proveedor');

Route::resource('notaingreso', NotaingresoController::class)->except(['show'])->names('admin.notaingreso');//listar todas las notas de ingreso
Route::get('notaingreso/report', [NotaingresoController::class,'report'])->name('admin.notaingreso.report');
Route::post('notaingreso/generar', [NotaingresoController::class,'generar'])->name('admin.notaingreso.generar');

Route::resource('detallesingreso', DetalleingresoController::class)->names('admin.detallesingreso');
Route::get('detallesingreso/{id}/generatePDF', [DetalleingresoController::class, 'generatePDF'])->name('admin.detallesingreso.generatePDF');

Route::resource('lote', LoteController::class)->names('admin.lote');

Route::resource('bitacoras', BitacoraController::class)->names('admin.bitacoras');

Route::get('/metodo-pago', MetodoPago::class)->name('metodo-pago');

Route::get('/suscripciones', Suscripciones::class)->name('suscripciones');

Route::resource('reportes',ReporteController::class)->except('show')->names('admin.reportes');
Route::get('reportes/report', [ReporteController::class,'report'])->name('admin.reportes.report');
Route::post('reportes/generar', [ReporteController::class,'generar'])->name('admin.reportes.generar');