<?php

namespace App\Models\Backend\Traits;

use Auth;

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
