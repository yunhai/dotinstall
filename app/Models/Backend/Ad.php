<?php

namespace App\Models\Backend;

use App\Models\Backend\Media;

class Ad extends Base
{
    public $fillable = [
        'name',
        'link',
        'media_id',
        'type',
        'mode',
        'login_mode'
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

    public function edit(int $id, array $input = [])
    {
        $result = parent::edit($id, $input);

        $input = data_set($input['youtube_link_media'], '*.youtube_link_id', $id);

        (new YoutubeLinkMedia)->editMany($input, $id);
        return $result;
    }
}
