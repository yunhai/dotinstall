<?php

namespace App\Http\Requests\Backend\Lesson\LessonDetail;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'caption' => 'nullable',
            'sort' => 'integer',
            'free_mode' => 'required|integer',
            'video' => 'nullable',
            'poster' => 'nullable',
            'source_code' => 'nullable',
            'resource' => 'nullable',
            'attachment' => 'nullable',
        ];
    }
}
