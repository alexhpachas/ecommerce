<?php

use App\Http\Controllers\Auth\LoginFacebookController;
use App\Http\Controllers\BillingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Politicas;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Terminos;
use App\Http\Controllers\WebhooksController;
use App\Http\Livewire\ShoppingCart;


use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\PaymentOrder;
use App\Mail\NotificationsMailable;
use App\Models\Order;
use App\Models\SocialProfile;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

/* IMPORTAMOS CLASE PARA HACER LOGIN POR FB Y GOOGLE */
use Laravel\Socialite\Facades\Socialite;



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

Route::get('/', WelcomeController::class)->name('index');

Route::get('search', SearchController::class)->name('search');

/* RUTA PARA MOSTRAR PRODUCTOS DEACUERDO A LA CATEGORIA */
Route::get('categories/{category}', [CategoryController::class,'show'])->name('categories.show');

/* RUTA PARA IR A UN DETERMINADO PRODUCTO Y AGREGARLO AL CARRITO */
Route::get('products/{product}', [ProductController::class,'show'])->name('products.show');

/* RUTA PARA INGRESAR AL CARRITO DE COMPRAS */
Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');

Route::get('products/{product}/pay', [ProductController::class,'pay'])->name('products.pay');

/* Route::get('notifications', function () {

    $correo = new NotificationsMailable;

    Mail::to('alex.h.pachas@gmail.com')->send($correo);

    return "Mensaje Enviado";
}); */

Route::middleware('auth')->group(function(){

    /* RUTA PARA VER NUESTRAS COMPRAS - ORDENES */
    Route::get('orders', [OrderController::class,'index'])->name('orders.index');

    /* RUTA PARA CREAR UNA ORDEN -> SOLO PARA USUARIOS REGISTADOS 'auth' */
    Route::get('orders/create', CreateOrder::class)->middleware('auth')->name('orders.create'); 

    /* RUTA PARA CUANDO EL PAGO SEA APROBADO PASARELA MERCADOPAGO */
    Route::get('orders/{order}', [OrderController::class,'show'])->name('orders.show');

    /* RUTA PARA CALIFICAR  UN PRODUCTO */
    Route::get('orders/qualify/{order}', [OrderController::class,'qualify'])->name('orders.qualify');

    /* RUTA PARA CUANDO YA CREAMOS UNA ORDEN DE COMPRA Y NECESITAMOS PAGARLO  */    
    Route::get('orders/{order}/payment',PaymentOrder::class)->name('orders.payment');

    /* CUANDO LA ORDEN YA FUE PAGADA. RUTA PARA VER LAS COMPRAS ECHAS */    
    Route::get('orders/{order}/pay', [OrderController::class,'pay'] )->name('orders.pay');

    /* RUTA PARA RECIBIR NOTIFICACIONES CADA VEZ QUE SE HACE UN PAGO EN MERCADO PAGO */
    Route::post('webhooks', WebhooksController::class);

    /* RUTA PARA METODO DE PAGOS STRIPE */

    Route::get('billing', [BillingController::class,'index'])->name('billing.index');

});

    Route::get('politicas', [Politicas::class,'politicas'])->name('politicas.index');
    Route::get('terminos', [Terminos::class,'terminos'])->name('terminos.index');

    Route::get('login/{driver}',[LoginFacebookController::class,'redirect'])->name('login.facebook');
    Route::get('login/{driver}/callback',[LoginFacebookController::class,'callback']);

    Route::get('probar', function () {
        return view('emails.notifications');
    });

    



