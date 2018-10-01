<?php

namespace App\Models\MsCategory;

use App\Models\Base;
use App\Models\Media;

class MsCategoryAttribute extends Base
{
    public $fillable = [
        'ms_category_id',
        'caption',
        'media_id',
        'level',
    ];

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function getAll()
    {
        $relations = [
            'media',
        ];

        return $this->with($relations)
                    ->get()
                    ->toArray();
    }
}
