<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Http\Service\Mail\MailerService;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from(env('APP_MAIL'), env('APP_NAME'))
            ->subject(MAIL_SUBJECT_USER_RESET_PASSWORD)
            ->view(
                'emails.user.reset_password', ['token' => $this->token]
            );
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
