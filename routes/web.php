<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\CreateOrder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class);

Route::get('search', SearchController::class)->name('search');

/* RUTA PARA MOSTRAR PRODUCTOS DEACUERDO A LA CATEGORIA */
Route::get('categories/{category}', [CategoryController::class,'show'])->name('categories.show');

/* RUTA PARA IR A UN DETERMINADO PRODUCTO Y AGREGARLO AL CARRITO */
Route::get('products/{product}', [ProductController::class,'show'])->name('products.show');

/* RUTA PARA INGRESAR AL CARRITO DE COMPRAS */
Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');

Route::get('orders/create', CreateOrder::class)->middleware('auth')->name('orders.create');

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */
