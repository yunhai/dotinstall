<?php

namespace App\Models;

class YoutubeLink extends Base
{
    public $visible = [
        'id',
        'link',
    ];

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function scopeEnable($query)
    {
        $query->where('mode', MODE_ENABLE);
    }

    public function random($quantity = 1)
    {
        $result = $this->with(['media'])
                    ->select('id', 'youtube_id', 'media_id', 'type')
                    ->enable()
                    ->inRandomOrder()
                    ->first();
        
        if ($result) {
            return [
                'id' => $result->id,
                'youtube_id' => $result->youtube_id,
                'media' => empty($result->media) ? '' : $result->media->path,
                'type' => $result->type,
            ];
        }
        return [];
    }
}
