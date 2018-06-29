<?php

namespace App\Models\Backend\Traits;

use Auth;

trait Deleting
{
    public static function bootDeleting()
    {
        static::deleting(function ($model) {
            echo 999;
            if ($model->relations) {
            }
        });
    }
}
