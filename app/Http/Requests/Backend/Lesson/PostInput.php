<?php

namespace App\Http\Requests\Backend\Lesson;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'mode' => 'nullable|integer',
            'difficulty' => 'required|integer',
            'category_id' => 'required|integer|exists:ms_categories,id',
        ];
    }
}
