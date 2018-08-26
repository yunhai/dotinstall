<?php

namespace App\Http\Requests\Backend\Affiliator;

use App\Rules\Backend\Affiliator\checkExistEmailRule;
use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'fullname' => 'required|max:256',
            'email' => [
                'required',
                'max:256',
                new checkExistEmailRule()
            ],
            'username' => 'required|max:256',
            'password' => 'required|max:256',
            'commission_rate' => 'required|numeric|between:0,100',
            'mode' => 'required|integer',
        ];
    }
}
