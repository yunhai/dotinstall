<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeEmailConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        // dd($this->data);
        return $this->from(env('APP_MAIL'), env('APP_NAME'))
                    ->subject('メール変更確認【プログラミングＧＯ】')
                    ->view('emails.user.change_email_confirmation')->with('data', $this->data['data']);
    }
}
