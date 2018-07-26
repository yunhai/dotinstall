<?php

namespace App\Mail\Console\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function build()
    {
        $data = [
            'content' => $this->data['content'],
        ];

        return $this->from(env('APP_MAIL'), env('APP_NAME'))
                    ->subject($this->data['title'])
                    ->view('emails.console.notification.notification')
                    ->with('data', $data);
    }
}
