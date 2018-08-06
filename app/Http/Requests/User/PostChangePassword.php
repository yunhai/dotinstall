<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Base;
use App\Rules\User\CheckCurrentPasswordRule;

class PostChangePassword extends Base
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_password' => [
                'required',
                new CheckCurrentPasswordRule()
            ],
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ];
    }
}
