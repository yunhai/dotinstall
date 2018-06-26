<?php

namespace App\Http\Requests\Backend\LessonMedia;

use App\Http\Requests\Backend\Base;
use App\Models\Backend\LessonMedia as LessonMediaModel;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
        ];
    }
}
