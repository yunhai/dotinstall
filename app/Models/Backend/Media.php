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
    ];

    public $hidden = [
        'location',
        'mime',
        'original_name',
        'hash_name',
        'extension',
        'size',
        'updated_at',
        'created_at',
    ];
}
