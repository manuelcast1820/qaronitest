<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailAssistant extends Mailable
{
    use Queueable, SerializesModels;
    public $event;
    public $email;
    public $quantity;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $event,$email,$quantity)
    {
        $this->event = $event;
        $this->email = $email;
        $this->quantity = $quantity;
        
        $this->subject('Notificación reservacion de entradas');

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.assistant');
    }
}
