<?php

namespace App\Http\Requests\Backend\MsCategory;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'ms_category.name' => 'required|max:255',
            'ms_category.sort' => 'nullable|integer',
        ];
    }
}
