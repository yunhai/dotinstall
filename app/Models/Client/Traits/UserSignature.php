<?php

namespace App\Models\Client\Traits;

use Auth;
use Carbon\Carbon;

trait UserSignature
{
    public static function bootUserSignature()
    {
        static::creating(function ($model) {
            $model->setUser();
            $model->setDate();
        });

        static::updating(function ($model) {
            $model->setUser('updated_user_id', true);
            $model->setDate('updated_at', true);
        });

        static::deleting(function ($model) {
            $model->update();
        });
    }

    protected function setUser(string $field = 'created_user_id', bool $update = false)
    {
        $user_id = Auth::guard('client')->id();
        $this->$field = $user_id;
        if ($update) {
            $this->updated_user_id = $user_id;
        }
    }

    protected function setDate(string $field = 'created_at', bool $update = false)
    {
        $now = Carbon::now();
        $this->$field = $now;
        if ($update) {
            $this->updated_at = $now;
        }
    }
}
