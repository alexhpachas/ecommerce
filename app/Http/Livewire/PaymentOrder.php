<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

/* PARA USAR POLICE EN UN COMPONENTE DE LIVEWIRE */
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class PaymentOrder extends Component
{
    use AuthorizesRequests;

    public $order;
    
    protected $listeners =['payOrder'];

    public function payOrder(){

        $this->order->status = 2;
        $this->order->save();

        return redirect()->route('orders.show',$this->order);
    }


    public function mount(Order $order){
        $this->order = $this->order;
    }

    public function render()
    {
        /* LLAMAMOS AL POLICE QUE CREAMOS EN app/Polices/OrderPolicy/autorize */
        $this->authorize('author',$this->order);

        $this->authorize('payment',$this->order);

        $items = json_decode($this->order->content);
        $envio = json_decode($this->order->envio);

        return view('livewire.payment-order',compact('items','envio'));
    }
}
