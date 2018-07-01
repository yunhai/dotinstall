<?php

namespace App\Models\Backend;

class Lesson extends Base
{
    public $fillable = [
        'name',
        'caption',
        'poster',
        'note',
        'video_count',
    ];
}
