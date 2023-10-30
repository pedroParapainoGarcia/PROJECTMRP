<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\UserController;

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

Route::get('/', function () {
    return view('auth.login');
});



//  Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
//      Route::get('/dashboard', function () {
//          return view('dashboard');
//      })->name('dashboard');
//  });

 Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

// Route::resource('categorias', CategoriaController::class)->names('categorias.index');
// Route::resource('productos', ProductoController::class)->names('repuestos.index');

// Route::get('/categorias/index', [CategoriaController::class, 'index']);
// Route::get('/productos/index', [ProductoController::class, 'index']);
// Route::post('/categorias/crear', [CategoriaController::class, 'create']);
// Route::post('/productos/crear', [ProductoController::class, 'create']);
// Route::post('/categorias/store', [CategoriaController::class, 'store']);
// Route::post('/productos/store', [ProductoController::class, 'store']);




