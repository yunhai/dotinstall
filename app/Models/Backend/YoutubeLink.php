<?php

namespace App\Models\Backend;

use App\Models\Backend\Media;
use App\Models\Backend\YoutubeLinkMedia;

class YoutubeLink extends Base
{
    public $fillable = [
        'name',
        'link',
        'youtube_id',
        'type',
        'mode',
    ];

    public function youtube_link_media()
    {
        return $this->hasMany(YoutubeLinkMedia::class);
    }

    public function getWithRelation($id)
    {
        $relations = [
            'youtube_link_media',
            'youtube_link_media.media',
        ];
        return $this
                ->with($relations)
                ->findOrFail($id);
    }

    public function create($input)
    {
        $result = parent::create($input);
        if (!empty($input['youtube_link_media'])) {
            $input = data_set($input['youtube_link_media'], '*.youtube_link_id', $result->id);
            (new YoutubeLinkMedia)->createMany($input);
        }
        return $result;
    }

    public function edit(int $id, array $input = [])
    {
        $result = parent::edit($id, $input);

        $input = data_set($input['youtube_link_media'], '*.youtube_link_id', $id);

        (new YoutubeLinkMedia)->editMany($input, $id);
        return $result;
    }
}
