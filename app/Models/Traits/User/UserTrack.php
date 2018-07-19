<?php

namespace App\Models\Traits\User;

trait UserTrack
{
    public static function bootUserTrack()
    {
        static::created(function ($model) {
            $model->where('id', $model->id)->update(['created_user_id' => $model->id]);
        });
    }
}
