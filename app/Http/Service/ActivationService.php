<?php

namespace App\Http\Service;

use Mail;
use App\Models\User\UserActivation;
use App\Models\User\User;
use App\Http\Service\Mail\MailerService;

class ActivationService
{
    protected $resendAfter = 24;
    protected $userActivation;

    public function __construct(UserActivation $userActivation)
    {
        $this->userActivation = $userActivation;
    }

    public function sendActivationMail($user)
    {
        if ($user->mode || !$this->shouldSend($user)) {
            return;
        }

        $token = $this->userActivation->createActivation($user);
        $user->activation_link = route('user.activate', $token);

        $mailer = new MailerService();
        $name = 'Mail\User\ActivationEmail';

        $mail = [
            'to' => [$user->email],
            'title' => MAIL_SUBJECT_USER_ACTIVATION,
            'data' => $user
        ];

        $mailer->send($name, $mail);
    }

    public function activateUser($token)
    {
        $activation = $this->userActivation->getActivationByToken($token);
        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);
        $user->mode = true;

        if ($user->grade !== USER_GRADE_PENDING_DIAMOND) {
            $user->grade = USER_GRADE_NORMAL;
        }

        $user->save();
        $this->userActivation->deleteActivation($token);

        return $user;
    }

    private function shouldSend($user)
    {
        $activation = $this->userActivation->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }
}
