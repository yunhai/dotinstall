<?php

namespace App\Models\Backend;

class Lesson extends Base
{
    public $fillable = [
        'name',
        'media_count',
        'user_id'
    ];
    
    public function lesson_media()
    {
        return $this->hasMany('App\Models\Backend\LessonMedia');
    }
}
