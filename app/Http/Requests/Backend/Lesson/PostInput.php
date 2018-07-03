<?php

namespace App\Http\Requests\Backend\Lesson;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'caption' => 'nullable',
            'note' => 'nullable'
        ];
    }
}
