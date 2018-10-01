<?php

namespace App\Models\Backend\MsCategory;

use App\Models\Backend\Base;
use App\Models\Backend\Media;

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

    public function getWithRelation($id)
    {
        $relations = [
            'media',
        ];

        return $this
              ->with($relations)
              ->findOrFail($id);
    }
}
