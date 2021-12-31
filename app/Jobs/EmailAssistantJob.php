<?php

namespace App\Jobs;

use App\Mail\EmailAssistant;
use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailAssistantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $event;
    public $email;
    public $quantity;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Event $event,$email,$quantity)
    {
        $this->event = $event;
        $this->email = $email;
        $this->quantity = $quantity;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new EmailAssistant($this->event ,$this->email,$this->quantity));
    }
}
