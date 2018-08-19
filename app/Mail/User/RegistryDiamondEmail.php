<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistryDiamondEmail extends Mailable
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
                    ->subject('月額会員になっており、誠にありがとうございます')
                    ->view('emails.user.registry_diamond')
                    ->with('data', $this->data['data']);
    }
}
