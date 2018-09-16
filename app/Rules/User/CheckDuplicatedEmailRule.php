<?php

namespace App\Rules\User;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User\User;

class CheckDuplicatedEmailRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !User::where('email', $value)
                  ->where('role', USER_ROLE_PUBLIC)
                  ->whereNull('deleted_at')
                  ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'そのメールアドレスはすでに登録されています';
    }
}
