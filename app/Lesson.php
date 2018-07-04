<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function lesson_details()
    {
        return $this->hasMany(LessonDetail::class);
    }
}
