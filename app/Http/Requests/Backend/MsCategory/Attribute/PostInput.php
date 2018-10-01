<?php

namespace App\Http\Requests\Backend\MsCategory\Attribute;

use App\Http\Requests\Backend\Base;

class PostInput extends Base
{
    public function rules()
    {
        return [
          'ms_category_id' => 'required|integer',
          'level' => 'required|integer',
          'caption' => 'nullable|max:256',
          'media_id' => 'nullable',
      ];
    }
}
