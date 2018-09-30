<?php

namespace App\Http\Requests\Backend\MsCategory;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'level' => 'required|integer',
            'caption' => 'nullable|max:256',
            'media_id' => 'nullable',
        ];
    }
}
