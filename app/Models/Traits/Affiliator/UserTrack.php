<?php

namespace App\Models\Traits\Affiliator;

trait UserTrack
{
    public static function bootUserTrack()
    {
        static::creating(function ($model) {
            $model->created_user_id = $model->user_id;
        });
    }
}
