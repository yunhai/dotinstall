<?php

namespace App\Models\Backend\Traits;

use Auth;

trait Sanitize
{
    public static function bootSanitize()
    {
        static::creating(function ($model) {
            $model->sanitize($model);
        });

        static::updating(function ($model) {
            $model->sanitize($model);
        });
    }

    protected function sanitize($model)
    {
        if ($model->fillable) {
            $keys = array_keys($model->toArray());
            foreach ($model->fillable as $field) {
                if (in_array($field, $keys) && is_null($model->$field)) {
                    $model->$field = '';
                }
            }
        }
    }
}
