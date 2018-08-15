<?php

namespace App\Http\Requests\Backend\User;

use App\Http\Requests\Backend\Base;

class PostChangePassword extends Base
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|min:6',
        ];
    }
}
