<?php

namespace App\Models\Backend\Lesson\Detail;

use App\Models\Backend\Base;

class LessonDetail extends Base
{
    public $fillable = [
        'name',
        'caption',
        'lesson_id',
        'video',
        'poster',
        'sort'
    ];
}
