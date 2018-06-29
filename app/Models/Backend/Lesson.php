<?php

namespace App\Models\Backend;

class Lesson extends Base
{
    public $fillable = [
        'name',
        'caption',
        'image_id',
        'note',
        'attachment_id',
        'video_count',
    ];
}
