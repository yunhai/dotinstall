<?php

namespace App\Http\Requests\Backend\YoutubeLink;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'link' => 'required|max:512',
            'mode' => 'required|integer',
        ];
    }
}
