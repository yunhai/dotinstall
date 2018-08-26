<?php

namespace App\Rules\Backend\Affiliator;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Affiliator\Affiliator;

class checkExistEmailRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !Affiliator::where('email', $value)
                  ->where('id', '<>', request()->route('affiliator_id'))
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
