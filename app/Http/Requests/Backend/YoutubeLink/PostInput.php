<?php

namespace App\Http\Requests\Backend\YoutubeLink;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'link' => 'nullable|max:512',
            'media_id' => 'nullable',
            'youtube_id' => 'nullable',
            'type' => 'required|integer',
            'mode' => 'required|integer',
        ];
    }
}
