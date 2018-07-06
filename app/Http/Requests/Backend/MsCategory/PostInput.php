<?php

namespace App\Http\Requests\Backend\MsCategory;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        $id = $this->route()->parameter('ms_category_id');
        return [
            'name' => 'required|max:256|unique:ms_categories,name,' . $id,
            'sort' => 'nullable|integer',
            'mode' => 'required|integer',
        ];
    }
}
