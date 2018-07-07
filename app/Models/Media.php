<?php

namespace App\Models;

class Media extends Base
{
    public $visible = [
        'id',
        'path',
        'original_name',
        'mime',
        'type',
    ];
}
