<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class passwordRest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    /**
     * Build the message.
     *
     * @return $this
     */

    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function build()
    {


        $data = [
            'email' => $this->request->input('email'),
            'token' => $this->request->input('_token'),
        ];
        return $this->view('mail.passwordresetmail')->with('data', $data);;
    }
}
