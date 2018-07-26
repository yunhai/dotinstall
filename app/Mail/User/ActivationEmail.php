<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from(env('APP_MAIL'), env('APP_NAME'))
                    ->subject($this->data['title'])
                    ->view('emails.user.activation')->with('user', $this->data['data']);
    }
}
