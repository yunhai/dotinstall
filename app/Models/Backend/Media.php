<?php

namespace App\Models\Backend;

class Media extends Base
{
    public $fillable = [
        'location',
        'path',
        'mime',
        'original_name',
        'hash_name',
        'extension',
        'size',
        'type',
    ];

    public $visible = [
        'id',
        'path',
        'original_name',
        'mime',
        'type',
    ];
}
