<?php

namespace App\Http\Requests\Backend\Setting;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'key' => 'nullable',
            'value' => 'required|max:1024',
            'show_name' => 'nullable',
        ];
    }
}
