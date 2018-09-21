<?php

namespace App\Http\Requests\Backend\Ad;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'link' => 'nullable|max:2048',
            'media_id' => 'nullable',
            'type' => 'required|integer',
            'mode' => 'required|integer',
        ];
    }
}
