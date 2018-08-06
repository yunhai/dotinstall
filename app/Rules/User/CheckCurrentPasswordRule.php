<?php

namespace App\Rules\User;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CheckCurrentPasswordRule implements Rule
{
    public function passes($attribute, $value)
    {
        $user = Auth::user();
        return Hash::check($value, $user->password);
    }

    public function message()
    {
        return '前のパスワードが不正のため、再確認して下さい';
    }
}
