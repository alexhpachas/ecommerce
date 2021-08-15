<?php

namespace App\Listeners;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MergeTheCart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        /* ESTE OYENTE SE EJECUTA CADA VEZ QUE HACEMOS LOGIN */
        
        Cart::merge(auth()->user()->id); /* SI EXISTE DATOS DE PRODUCTOS EN LA TABLA CON ESTE USUARIO PEDIMOS QUE LO RECUPERE  */
    }
}
