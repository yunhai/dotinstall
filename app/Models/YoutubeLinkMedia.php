<?php

namespace App\Models;

use App\Models\Media;

class YoutubeLinkMedia extends Base
{
    public $fillable = [];

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }
}
