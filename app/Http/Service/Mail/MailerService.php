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

        $mailer = call_user_func_array(['Mail', 'to'], $mail['to']);
        $mailer->from(env('APP_MAIL'), env('APP_NAME'));

        if ($mail['bcc']) {
            foreach ($mail['bcc'] as $bcc) {
                $mailer = call_user_func_array(['Mail', 'bcc'], $bcc);
            }
        }

        $mailer->send($mailable);
    }
}
