<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonDetail extends Base
{
    public function media()
    {
        return $this->hasMany('App\Models\Media', 'id', 'poster');
    }
}
