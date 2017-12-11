<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FirstTimeDiscount extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this
            ->from(['info@psoeasy.com','Psoeasy'])
            ->view('emails.firstTimeDiscount');
    }
}
