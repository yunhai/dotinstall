<?php

namespace App\Http\Requests\Backend\Annoucement;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'title' => 'nullable',
            'content' => 'required',
        ];
    }
}
