<?php

namespace App\Models\Backend;

use Carbon\Carbon;

class Setting extends Base
{
    public $fillable = [
        'key',
        'show_name',
        'value',
    ];
}
