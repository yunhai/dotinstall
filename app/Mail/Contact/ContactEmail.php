<?php

namespace App\Mail\Contact;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
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
                    ->subject(MAIL_SUBJECT_CONTACT)
                    ->view('emails.contact.contact')->with('data', $this->data);
    }
}
