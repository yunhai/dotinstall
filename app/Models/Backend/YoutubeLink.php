<?php

namespace App\Models\Backend;

class YoutubeLink extends Base
{
    public $fillable = [
        'name',
        'link',
        'youtube_id',
        'mode',
    ];
}
