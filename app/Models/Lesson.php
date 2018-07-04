<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Base
{
    public function lesson_details()
    {
        return $this->hasMany(LessonDetail::class);
    }
}
