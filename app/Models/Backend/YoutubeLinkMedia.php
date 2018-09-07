<?php

namespace App\Models\Backend;

use App\Models\Backend\Media;

class YoutubeLinkMedia extends Base
{
    public $fillable = [
        'youtube_link_id',
        'media_id',
        'url',
        'sort',
    ];

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function createMany(array $input)
    {
        foreach ($input as $item) {
            $this->create($item);
        }
    }

    public function editMany($input, $youtube_link_id)
    {
        $input_media_id = data_get($input, '*.media_id');
        
        $old = $this
            ->select('id', 'media_id')
            ->where('youtube_link_id', $youtube_link_id)
            ->get()
            ->pluck('id', 'media_id')
            ->toArray();
        
        $delete_media_id = array_diff(array_keys($old), $input_media_id);
        foreach ($input as $item) {
            if (empty($old[$item['media_id']])) {
                $this->create($item);
            } else {
                $data = array_intersect_key($item, array_flip($this->fillable));
                $this->where('id', $old[$item['media_id']])->update($data);
            }
        }
        
        $delete_id = $this->select('id')
                        ->where('youtube_link_id', $youtube_link_id)
                        ->whereIn('media_id', $delete_media_id)
                        ->get()
                        ->pluck('id', 'id')
                        ->toArray();

        $this->whereIn('id', $delete_id)
            ->delete();
    }
}
