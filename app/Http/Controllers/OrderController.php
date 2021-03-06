<?php

namespace App\Http\Controllers;

use App\Mail\NotificationsPaymentMailable;
use App\Models\Order;
use App\Models\Qualify;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    

    /* METODO QUE PERMITE VER NUESTRAS COMPRAS */
    public function index(){

        $orders = Order::query()->where('user_id',auth()->user()->id);

        if (request('status')) {
            $orders = $orders->where('status',request('status'));
        }
        
        $orders = $orders->orderBy('created_at','desc')->get();

        $pendiente = Order::where('status',1)->where('user_id',auth()->user()->id)->count();
        $recibido = Order::where('status',2)->where('user_id',auth()->user()->id)->count();
        $enviado = Order::where('status',3)->where('user_id',auth()->user()->id)->count();
        $entregado = Order::where('status',4)->where('user_id',auth()->user()->id)->count();
        $anulado = Order::where('status',5)->where('user_id',auth()->user()->id)->count();

        return view('orders.index',compact('orders','pendiente','recibido','enviado','entregado','anulado'));
    }

    public function show(Order $order){

        /* LLAMAMOS AL POLICE QUE CREAMOS EN app/Polices/OrderPolicy/autorize */
        $this->authorize('author',$order);

        $items = json_decode($order->content);
        $envio = json_decode($order->envio);

        return view('orders.show',compact('order','items','envio'));
    }

    public function qualify(Order $order){

        /* LLAMAMOS AL POLICE QUE CREAMOS EN app/Polices/OrderPolicy/autorize */
        $this->authorize('author',$order);

        $items = json_decode($order->content);
        $envio = json_decode($order->envio);
        

        $qualifications = Qualify::where('order_id',$order->id)->get();

        return view('orders.qualify',compact('order','items','envio','qualifications'));
    }

    /* METODO PARA OBTENER EL ID DE COMPRA POR MERCADO PAGO */
    public function pay(Order $order,Request $request){
        $payment_id = $request->get('payment_id');     
        
        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=APP_USR-8205024013896619-081621-20346e21ec31555f1924c94d95bcd197-808842071");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $order->status = 2;
            $order->save();
            Mail::to('alex.h.pachas@gmail.com')->send(new NotificationsPaymentMailable($order));
        }

        return redirect()->route('orders.show',$order);       
    }

}
