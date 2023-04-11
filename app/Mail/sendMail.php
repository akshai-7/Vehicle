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
    // public function __construct()
    // {
    //     //
    // }

    // /**
    //  * Build the message.
    //  *
    //  * @return $this
    //  */
    // public function build()
    // {
    //     return $this->markdown('mail.sendmail');
    // }
    public $data1;

    public function __construct($data1)
    {
        $this->data1 = $data1;
    }

    public function build()
    {
        return $this->view('mail.sendmail')
            ->with('data1', $this->data1);
    }
}
