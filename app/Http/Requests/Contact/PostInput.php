<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'email' => 'required|email',
            'phone' => 'nullable',
            'content' => 'required|max:1024',
        ];
    }
}
