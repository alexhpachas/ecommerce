<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;

/* AGREGAMOS LA CLASE CART DE SHOOPING CART */
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItemSize extends Component
{
    public $product;
    public $sizes;
    public $color_id="";
    public $size_id="";
    public $colors=[];
    public $qty = 1;
    public $quantity;
    public $options = [];

    public function updatedSizeId($value){
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->options['size'] = $size->name;
        $this->options['size_id'] = $size->id;
        
        $this->reset('color_id');    
        $this->reset('quantity');
        
        
        
    }

    public function updatedColorId($value){
        $size = Size::find($this->size_id);
        $color = $size->colors->find($value);
        $this->quantity = aty_avaliable($this->product->id ,$this->color_id,$this->size_id);
        $this->options['color'] = $color->name;
        $this->options['color_id'] = $color->id;

    }

    public function mount(){
        $this->sizes = $this->product->sizes;
        $this->options['image']= Storage::url($this->product->images->first()->url);

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
        if($this->quantity > 0) {
        Cart::add([
                    'id' => $this->product->id,
                    'name' => $this->product->name, 
                    'qty' => $this->qty,
                    'price' => $this->product->price, 
                    'weight' => 550, 
                    'options' => $this->options
                ]);

        $this->quantity = aty_avaliable($this->product->id ,$this->color_id,$this->size_id);  
        $this->reset('qty');      
        $this->emitTo('dropdown-cart','render');
    }

        /* Cart::destroy(); */
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
