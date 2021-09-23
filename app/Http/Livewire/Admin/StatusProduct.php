<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class StatusProduct extends Component
{

    public $product, $status;

    public $estado=false;//PARA QUE FUNCIONE EL TOGLLE BUTTON COMENTADO

    public function mount(){
        $this->status = $this->product->status;
    }

    public function save(){

        $this->product->status = $this->status;
        $this->product->save();

        $this->emit('update','El Estado del producto ha sido actualizado');

        /* if ($this->status==1) {
            $this->product->status = 2;
            
        }else{
            $this->product->status = 1;
        }

        $this->product->save(); */

    }

    public function render()
    {
        return view('livewire.admin.status-product');
    }
}
