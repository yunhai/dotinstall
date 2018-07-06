<?php

namespace App\Http\Requests\Backend\Lesson;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'category_id' => 'required|integer|exists:ms_categories,id',
            'poster' => 'nullable',
            'caption' => 'nullable',
            'note' => 'nullable',
            'mode' => 'required|integer',
            'free_mode' => 'nullable|integer',
        ];
    }
}
