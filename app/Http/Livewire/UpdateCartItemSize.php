<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCartItemSize extends Component
{
    public $rowId,$qty,$quantity;

    public function mount(){
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;
        $color = Color::where('name',$item->options->color)->first();
        $size = Size::where('name',$item->options->size)->first();
        $this->quantity = aty_avaliable($item->id,$color->id,$size->id);
    }

    /* METODO PARA INCREMENTAR LA CANTIDAD DE PRODUCTOS QUE VAMOS A COMPRAR */
    public function increment(){
        if($this->quantity == 0)
        $this->qty = $this->qty;
        else
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId,$this->qty);
        $this->emit('render');
        
        
    }

    /* METODO PARA DISMINUIR LA CANTIDAD DE PRODUCTOS QUE VAMOS A COMPRAR */
    public function decrement(){
        if($this->qty != 1){
            $this->qty = $this->qty - 1;
        }else{
            $this->qty = 1;
        }  
        
        $this->render();
            Cart::update($this->rowId,$this->qty);
            $this->emit('render');                        
    }
    
    public function render()
    {
        return view('livewire.update-cart-item-size');
    }
}
