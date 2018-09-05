<?php

namespace App\Models\Backend;

use App\Models\Backend\Media;

class YoutubeLink extends Base
{
    public $fillable = [
        'name',
        'link',
        'media_id',
        'youtube_id',
        'type',
        'mode',
    ];

    public function media()
    {
        return $this->hasMany(Media::class, 'id', 'media_id');
    }

    public function getWithRelation($id)
    {
        $relations = [
            'media'
        ];
        return $this
                ->with($relations)
                ->findOrFail($id);
    }
}
