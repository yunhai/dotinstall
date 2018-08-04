<?php

namespace App\Http\Requests\Backend\Auth;

use App\Http\Requests\Backend\Base;
use App\Rules\Backend\Auth\CheckCurrentPasswordRule;

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
