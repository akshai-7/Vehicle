<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class remainderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.s
     *
     * @return void
     */
    public $key;
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.remaindermail');

        return $this->view('mail.remaindermail')
            ->with('key', $this->key);
    }
}
