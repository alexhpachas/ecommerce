<?php

namespace App\Mail;

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
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /* return $this->view('emails.notifications'); */
        return $this->view('orders.payment',$this->order);
    }
}
