<?php

namespace App\Models;

class YoutubeLink extends Base
{
    public $visible = [
        'id',
        'link',
    ];

    public function youtube_link_media()
    {
        return $this->hasMany(YoutubeLinkMedia::class);
    }

    public function scopeEnable($query)
    {
        $query->where('mode', MODE_ENABLE);
    }

    public function random($quantity = 1)
    {
        $result = $this->with(['youtube_link_media'])
                    ->select('id', 'youtube_id', 'media_id', 'type')
                    ->enable()
                    ->inRandomOrder()
                    ->first();

        if ($result) {
            $slideshow = [];
            if ($result->type == YOUTUBE_TYPE_IMAGE && $result->youtube_link_media->isNotEmpty()) {
                foreach ($result->youtube_link_media as $item) {
                    $tmp = [
                        'id' => $item->id,
                        'url' => $item->url,
                        'path' => $item->media->path,
                    ];
                    array_push($slideshow, $tmp);
                }
            }

            return [
                'id' => $result->id,
                'youtube_id' => $result->youtube_id,
                'slideshow' => $slideshow,
                'type' => $result->type,
            ];
        }
        return [];
    }
}
