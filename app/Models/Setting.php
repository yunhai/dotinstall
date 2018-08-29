<?php

namespace App\Models;

use Carbon\Carbon;

class Setting extends Base
{
    public $fillable = [
        'key',
        'value',
    ];
    
    public function getAll()
    {
        return $this->select('key', 'value')
                    ->where('mode', MODE_ENABLE)
                    ->get()
                    ->pluck('value', 'key')
                    ->toArray();
    }
}
