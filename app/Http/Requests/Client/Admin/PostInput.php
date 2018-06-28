<?php

namespace App\Http\Requests\Client\Admin;

use App\Http\Requests\Client\Base;
use App\Models\Client\Admin as AdminModel;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }
}
