<?php

namespace App\Models\Backend\Traits;

trait Deleting
{
    public static function bootDeleting()
    {
        static::deleting(function ($model) {
            if ($model->relations) {
            }
        });
    }
}
