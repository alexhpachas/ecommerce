<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{

    public function show(Order $order){
        return view('orders.show',compact('order'));
    }

    /* METODO PARA PAGAR UNA ORDEN POR MERCADO PAGO */

    /* public function payment(Order $order){
        $items = json_decode($order->content);
        return view('orders.payment',compact('order','items'));
    } */

    /* METODO PAYMENT NO UTILIZADO */
    

    /* METODO PARA OBTENER EL ID DE COMPRA POR MERCADO PAGO */
    public function pay(Order $order,Request $request){
        $payment_id = $request->get('payment_id');     
        
        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=APP_USR-8205024013896619-081621-20346e21ec31555f1924c94d95bcd197-808842071");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $order->status = 2;
            $order->save();
        }

        return redirect()->route('orders.show',$order);       
    }

}
