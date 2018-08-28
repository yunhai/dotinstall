<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyRegistryDiamondEmail extends Mailable
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
                    ->subject('新規有料会員が入ったら')
                    ->view('emails.user.notify_registry_diamond');
    }
}
