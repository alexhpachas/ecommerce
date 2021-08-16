<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartItem extends Component
{
    public $rowId,$qty,$quantity;
    public $product;

    protected $listeners =['render'];

    public function mount(){
        $item = Cart::get($this->rowId);
        $this->product = $item->id;
        $this->quantity = aty_avaliable($this->product);
        $this->qty = $item->qty;
        /* $this->quantity = aty_avaliable($item->id); */
        
    }

    /* METODO PARA INCREMENTAR LA CANTIDAD DE PRODUCTOS QUE VAMOS A COMPRAR */
    public function increment(){
        if($this->quantity == 0)
        $this->qty = $this->qty;
        else
        
        $this->qty = $this->qty + 1;

        
        Cart::update($this->rowId,$this->qty);
        $this->emit('render');
        $this->quantity = aty_avaliable($this->product);
        
        
        
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
            $this->quantity = aty_avaliable($this->product);                     
    }

    public function render()
    {
        return view('livewire.update-cart-item');
    }


    
}
