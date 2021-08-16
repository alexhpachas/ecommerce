<?php

namespace App\Http\Livewire;

use Livewire\Component;

/* AGREGAMOS LA CLASE CART DE SHOOPING CART */
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItemColor extends Component
{
    public $product, $colors;
    public $qty = 1; /* VARIABLE CANTIDAD DE PRODUCTOS */
    public $color_id=""; /* VARIABLE PARA CAPTURAR EL COLOR QUE SE HA SELECCIONADO */
    public $quantity; /* VARIABLE PARA STOCK */
    public $options = [
        'size_id'=>null
    ];
    

    /* MOUNT -> CAPTURAMOS LA VARIABLE PRODUCT QUE FUE ENVIADO DESDE EL COMPONENTE */
    public function mount(){
        $this->colors = $this->product->colors;        
        $this->options['image'] = Storage::url($this->product->images->first()->url);     
                        
    }

    /* METODO PARA CAPTURAR EL ID DEL COLOR Y PODER SACAR EL STOCK DE UNA TABLA PIVOT */
    public function updatedColorId($value){
        $color = $this->product->colors->find($value);
        $this->quantity = aty_avaliable($this->product->id ,$this->color_id);
        $this->options['color'] = $color->name;
        $this->options['color_id'] = $color->id;
        
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
   
    public function addItem(){
        Cart::add([
                    'id' => $this->product->id,
                    'name' => $this->product->name, 
                    'qty' => $this->qty,                    
                    'price' => $this->product->price, 
                    'weight' => 550, 
                    'options' => $this->options
                ]);

        $this->quantity = aty_avaliable($this->product->id, $this->color_id);

        
        $this->reset('qty');

        $this->emitTo('dropdown-cart','render');
        
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }

    
}
