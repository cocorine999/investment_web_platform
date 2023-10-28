<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TwoAuthentification extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;

    public function __construct($demo)
	{
		$this->demo = $demo;
	}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.2fa_authentification');
    }
}
