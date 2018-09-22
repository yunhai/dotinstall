<?php

namespace App\Models;

class Ad extends Base
{
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
                    ->select('id', 'name', 'media_id', 'type', 'link')
                    ->enable()
                    ->inRandomOrder()
                    ->first();

        if ($result) {
            return $result->toArray();
        }

        return [];
    }
}
