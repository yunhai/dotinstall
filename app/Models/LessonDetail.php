<?php

namespace App\Models;

class LessonDetail extends Base
{
    public function media()
    {
        return $this->hasMany('App\Models\Media', 'id', 'poster');
    }
}
