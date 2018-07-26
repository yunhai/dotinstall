<?php

namespace App\Http\Service\Mail;

use Mail;

class MailerService
{
    public function send(string $mailable, array $mail = [])
    {
        if ($mailable) {
            $name = '\App\\' . $mailable;
            $mailable = new $name($mail);
        }

        $mailer = Mail::subject($mail['title']);
        $mailer = call_user_func_array(['mailer', 'to'], $mail['to']);
        if ($mail['bcc']) {
            foreach ($mail['bcc'] as $bcc) {
                $mailer = call_user_func_array(['mailer', 'bcc'], $bcc);
            }
        }

        $mailer->send($mailable);
    }
}
