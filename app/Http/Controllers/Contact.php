<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\PostInput;
use App\Http\Service\Mail\MailerService;

class Contact extends Base
{
    public function getContact()
    {
        return $this->render('contact.contact');
    }

    public function postContact(PostInput $request)
    {
        $input = $request->all();
        $this->sendContactMail($input);
        return redirect()->route('contact.finish');
    }

    public function getFinish()
    {
        return $this->render('contact.finish');
    }
    
    protected function sendContactMail(array $mail)
    {
        $mail['to'] = [
            env('APP_CONTACT_MAIL', ''),
            env('APP_CONTACT_MAIL_NAME', '')
        ];

        $mailer = new MailerService();
        $name = 'Mail\Contact\ContactEmail';
        $mailer->send($name, $mail);
    }
}
