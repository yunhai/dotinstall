<?php

namespace App\Http\Requests\Backend\Lesson\Detail;

use App\Http\Requests\Backend\Base;
use App\Models\Backend\Lesson as LessonModel;

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
