<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Base;
use App\Rules\User\CheckCurrentPasswordRule;
use App\Rules\User\CheckDuplicatedEmailRule;
use Auth;

class PostChangeEmail extends Base
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'email' => ['required', 'email', new CheckDuplicatedEmailRule()]
        ];
        return $rules;
    }
}
