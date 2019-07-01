<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct($user)
    {
        $this->user = $user;
    }


    public function build()
    {
        return $this->view('email.demo', [
            'user' => $this->user
        ]);
    }
}
