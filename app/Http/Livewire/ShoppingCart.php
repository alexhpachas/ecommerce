<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{    
    protected $listeners =['render'];
    
    /* FUNCION PARA VACIAR CARRITO DE COMPRAS */
    public function destroy(){
        Cart::destroy();
        $this->emitTo('dropdown-cart','render');

        /* ACTUALIZAMOS EL CARRITO DE COMPRAS VISTA MOBIL */
        $this->emitTo('cart-mobil','render');
    }

    /* FUNCION PARA BORRAR UN PRODUCTO DEL CARRITO DE COMPRAS */
    public function delete($rowId){
        Cart::remove($rowId);
        $this->emitTo('dropdown-cart','render');
        /* ACTUALIZAMOS EL CARRITO DE COMPRAS VISTA MOBIL */
        $this->emitTo('cart-mobil','render');
    }



    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
