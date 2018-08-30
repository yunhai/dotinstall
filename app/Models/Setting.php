<?php

namespace App\Models;

use Carbon\Carbon;

class Setting extends Base
{
    public $fillable = [
        'key',
        'show_name',
        'value',
    ];

    public function getAll()
    {
        return $this->select('key', 'show_name', 'value')
                    ->where('mode', MODE_ENABLE)
                    ->get()
                    ->pluck('value', 'key')
                    ->toArray();
    }
}
