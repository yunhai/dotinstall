<?php

namespace App\Http\Requests\Backend\Setting;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        $id = $this->route()->parameter('setting_id');
        return [
            'key' => 'required|max:64',
            'value' => 'required|max:1024',
        ];
    }
}
