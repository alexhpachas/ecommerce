<?php

namespace App\Listeners;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MergeCartLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        /* ESTE OYENTE SE EJECUTA CADA VEZ QUE CERRAMOS SESSION */
        
        Cart::erase(auth()->user()->id);//Primero eliminamos el contenido del carrito que ya existe del usuario
        
        Cart::store(auth()->user()->id);//Luego Guardamos el nuevo contenido del carrito del usuario en una tabla cuando cierre session
    }
}
