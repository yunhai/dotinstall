<?php

namespace App\Models;

class YoutubeLink extends Base
{
    public $visible = [
        'id',
        'link',
    ];

    public function scopeEnable($query)
    {
        $query->where('mode', MODE_ENABLE);
    }

    public function random($quantity = 1)
    {
        $result = $this->select('id', 'link')
            ->enable()
            ->first();
        if ($result) {
            return $result->toArray();
        }
        return [];
    }
}
