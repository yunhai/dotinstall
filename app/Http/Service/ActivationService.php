<?php

namespace App\Http\Service;

use Mail;
use App\Models\User\UserActivation;
use App\Models\User\User;
use App\Mail\UserActivationEmail;

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
        $mailable = new UserActivationEmail($user);
        Mail::to($user->email)->send($mailable);
    }

    public function activateUser($token)
    {
        $activation = $this->userActivation->getActivationByToken($token);
        if ($activation === null) return null;
        $user = User::find($activation->user_id);
        $user->mode = true;
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
