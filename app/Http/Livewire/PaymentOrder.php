<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Exception;
use Livewire\Component;


/* PARA USAR POLICE EN UN COMPONENTE DE LIVEWIRE */
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class PaymentOrder extends Component
{
    use AuthorizesRequests;

    public $order;
    public $contar = 0;
    public $type=1;
    public $methodPayment=3;
    public $openMethodPayment=false;
    /* public $coupon; */

    /* PAGO STRIPE */
    

    
    protected $listeners =['payOrder','paymentMethodCreate'];

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

    public function paymentMethodCreate($paymentMethod){
    
            /* if ($this->coupon) {
                auth()->user()->charge($this->order->total * 100,$paymentMethod)->withCoupon($this->coupon);               
            }else{ */
                auth()->user()->charge($this->order->total * 100,$paymentMethod);
                $this->emit('resetStripe');
                $this->emit('payOrder');
           /*  }     */                    
            
        
        
    }
}
