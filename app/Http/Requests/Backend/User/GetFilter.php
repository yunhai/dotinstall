<?php

namespace App\Http\Requests\Backend\User;

use App\Http\Requests\Backend\Base;

class GetFilter extends Base
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fullname' => 'nullable',
            'email' => 'nullable',
        ];
    }
}
