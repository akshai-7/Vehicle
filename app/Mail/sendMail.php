<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function build()
    {
        return $this->view('mail.sendmail')
            ->with('key', $this->key);
    }
}
