<?php

namespace App\Models\Backend\Traits;

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
            if ($model->deleted_user_id) {
                return;
            }
            $model->setUser('updated_user_id', false);
            $model->setDate('updated_at', false);
        });

        static::deleting(function ($model) {
            $column = [
                'deleted_at' => Carbon::now(),
                'deleted_user_id' => Auth::user()->id,
            ];

            $model->update($column);

            return false;
        });
    }

    protected function setUser(string $field = 'created_user_id', bool $update = true)
    {
        $user = Auth::user();
        $this->$field = $user->id;
        if ($update) {
            $this->updated_user_id = $user->id;
        }
    }

    protected function setDate(string $field = 'created_at', bool $update = true)
    {
        $now = Carbon::now();
        $this->$field = $now;
        if ($update) {
            $this->updated_at = $now;
        }
    }
}
