<?php

namespace App\Http\Requests\Backend\Admin;

use App\Http\Requests\Backend\Base;
use App\Models\Backend\Admin as AdminModel;

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
