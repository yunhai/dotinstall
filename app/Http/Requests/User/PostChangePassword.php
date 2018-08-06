<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Base;
use App\Rules\User\CheckCurrentPasswordRule;
use Auth;

class PostChangePassword extends Base
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ];

        if (!Auth::user()->provider) {
            $rules['current_password'] = [
                'required',
                new CheckCurrentPasswordRule()
            ];
        }

        return $rules;
    }
}
