<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $qty = 1;

    public $product; /* ESTA VARIABLE ES PARA RECIBIR LOS DATOS QUE SON ENVIADOS DESDE LA VISTA products.show -> en la condicional */
    public $quantity; /* VARIABLE PARA CAPTURAR EL STOCK DEL PRODUCTO */

    /* VARIABLE AQUI VAMOS A ALMACENAR LA URL DE LA IMAGEN DEL PRODUCTO QUE VAMOS A AGREGAR AL CARRITO DE COMPRAS */
    public $options = [ 
        'color_id'=>null,
        'size_id' =>null
    ]; 

    public function mount(){
        $this->quantity = aty_avaliable($this->product->id);
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }

    /* METODO PARA INCREMENTAR LA CANTIDAD DE PRODUCTOS QUE VAMOS A COMPRAR */
    public function increment(){
        if($this->qty == $this->quantity)
        $this->qty = $this->qty;
        else
        $this->qty = $this->qty + 1;
    }

    /* METODO PARA DISMINUIR LA CANTIDAD DE PRODUCTOS QUE VAMOS A COMPRAR */
    public function decrement(){
        if($this->qty != 1)
            $this->qty = $this->qty - 1;
        else
            $this->qty = 1;
    }

    /* METODO PARA AGREGAR ITEM AL CARRITO DE COMPRAS */
    public function addItem(){
        if($this->quantity > 0){

            Cart::add(['id' => $this->product->id, 
                        'name' => $this->product->name, 
                        'qty' => $this->qty, 
                        'price' => $this->product->price, 
                        'weight' => 550, 
                        'options' => $this->options
                    ]);

            $this->quantity = aty_avaliable($this->product->id);

            $this->reset('qty');
            $this->emitTo('dropdown-cart','render');      
        }
        
        /* Cart::destroy(); */
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
