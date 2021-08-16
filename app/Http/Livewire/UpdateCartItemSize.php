<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCartItemSize extends Component
{
    public $rowId,$qty,$quantity;
    public $product,$color,$size;

    public function mount(){
        $item = Cart::get($this->rowId);        
        $this->qty = $item->qty;
        $this->color = Color::where('name',$item->options->color)->first();
        $this->size = Size::where('name',$item->options->size)->first();

        $this->product = $item->id;
        $this->quantity = aty_avaliable($this->product,$this->color->id,$this->size->id);

        /* $this->quantity = aty_avaliable($item->id,$color->id,$size->id); */
    }

    /* METODO PARA INCREMENTAR LA CANTIDAD DE PRODUCTOS QUE VAMOS A COMPRAR */
    public function increment(){
        if($this->quantity == 0)
        $this->qty = $this->qty;
        else
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId,$this->qty);
        $this->emit('render');
        $this->quantity = aty_avaliable($this->product,$this->color->id,$this->size->id);
        
        
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
            $this->quantity = aty_avaliable($this->product,$this->color->id,$this->size->id);                     
    }
    
    public function render()
    {
        return view('livewire.update-cart-item-size');
    }
}
