<?php

namespace App\Http\Requests\Backend\Lesson;

use App\Http\Requests\Backend\Base;
use App\Models\Backend\Lesson as LessonModel;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'media_count' => 'nullable|integer',
        ];
    }
}
