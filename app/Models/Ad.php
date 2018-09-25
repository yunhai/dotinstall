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
        $login_mode = \Auth::id() ? AD_AFTER_LOGIN_MODE : AD_BEFORE_LOGIN_MODE;
        $result = $this->with(['media'])
                    ->select('id', 'name', 'media_id', 'type', 'link')
                    ->where('login_mode', $login_mode)
                    ->enable()
                    ->inRandomOrder()
                    ->first();

        if ($result) {
            return $result->toArray();
        }

        return [];
    }
}
