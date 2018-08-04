<?php

namespace App\Http\Requests\Client\Auth;

use App\Http\Requests\Client\Base;

class PostLogin extends Base
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
