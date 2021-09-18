<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationsMailable extends Mailable
{
    public $order;
    use Queueable, SerializesModels;

        public $subjet = "Información de Contacto";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = json_decode($order);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->order;
        return $this->view('emails.notifications',compact('order'));
        /* return $this->view('orders.payment',$this->order); */
    }
}
