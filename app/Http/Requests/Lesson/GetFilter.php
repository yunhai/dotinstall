<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Base;

class GetFilter extends Base
{
    public function rules()
    {
        return [
            'difficulty' => 'nullable',
            'keyword' => 'nullable',
            'category' => 'nullable',
        ];
    }
}
