<?php

namespace App\Http\Requests\Backend\Auth;

use App\Http\Requests\Backend\Base;

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
