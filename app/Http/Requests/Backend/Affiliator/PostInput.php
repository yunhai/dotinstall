<?php

namespace App\Http\Requests\Backend\Affiliator;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'fullname' => 'required|max:256',
            'email' => 'required|max:256',
            'username' => 'required|max:256',
            'password' => 'required|max:256',
            'commission_rate' => 'required|numeric|between:0,100',
            'mode' => 'required|integer',
        ];
    }
}
