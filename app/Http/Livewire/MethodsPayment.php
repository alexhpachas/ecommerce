<?php

namespace App\Http\Livewire;

use App\Models\Utility;
use Livewire\Component;

class MethodsPayment extends Component
{
    protected $listeners =['render'];

    public $methodType = 1;
    public $openYape = false;
    public $openPlim = false;
    public $openLukita = false;
    public $openTunki = false;
    public $type;
    public $total;
    public $orderId;
    

    public function render()
    {
        $yape = Utility::where('description','YAPE')->first();
        $plim = Utility::where('description','PLIM')->first();
        $tunki = Utility::where('description','TUNKI')->first();
        $lukita = Utility::where('description','LUKITA')->first();
        
        return view('livewire.methods-payment',compact('yape','plim','tunki','lukita'));
    }

    public function aceptar(){
        $this->reset('openYape');
    }
}
