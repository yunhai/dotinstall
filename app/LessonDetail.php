<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonDetail extends Model
{
    public function media()
    {
        return $this->hasMany('App\Media', 'id', 'poster');
    }
}
