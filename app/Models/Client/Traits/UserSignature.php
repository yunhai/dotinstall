<?php

namespace App\Models\Backend\Traits;

use Auth;
use Carbon\Carbon;

trait UserSignature
{
    public static function bootUserSignature()
    {
        static::creating(function ($model) {
            $model->setUser(true);
            $model->setDate(true);
        });

        static::updating(function ($model) {
            $model->setUser(false);
            $model->setDate(false);
        });

        static::deleting(function ($model) {
            $model->saveTrash();
            $model->setUser(false);
            $model->save();
        });
    }

    protected function setUser(bool $is_creating)
    {
        $user = Auth::user();
        if ($is_creating) {
            $this->created_user_id = $user->id;
        }
        $this->updated_user_id = $user->id;
    }

    protected function setDate(bool $is_creating)
    {
        $now = Carbon::now();
        if ($is_creating) {
            $this->created_at = $now;
        }
        $this->updated_at = $now;
    }
}
