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
                    ->select('id', 'youtube_id', 'media_id', 'type', 'link', 'name')
                    ->enable()
                    ->get();

        $slideshow = [];
        if ($result) {
            foreach ($result as $item) {
                if ($item->type == YOUTUBE_TYPE_IMAGE) {
                    foreach ($item->youtube_link_media as $item2) {
                        $tmp = [
                            'id' => $item2->id,
                            'name' => $item->name,
                            'url' => $item->link,
                            'path' => $item2->media->path,
                            'type' => $item->type
                        ];
                        array_push($slideshow, $tmp);
                    }
                } else {
                    $tmp = [
                        'id' => $item->id,
                        'youtube_id' => $item->youtube_id,
                        'type' => $item->type,
                        'name' => $item->name
                    ];
                    array_push($slideshow, $tmp);
                }
            }
        }

        return $slideshow;
    }
}
