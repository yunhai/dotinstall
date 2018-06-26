<?php

namespace App\Models\Backend;

class Lesson extends Base
{
    public $fillable = [
        'name',
        'media_count',
        'user_id'
    ];
}
