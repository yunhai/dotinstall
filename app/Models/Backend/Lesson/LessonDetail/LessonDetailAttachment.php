<?php

namespace App\Models\Backend\Lesson\LessonDetail;

use App\Models\Backend\Base;
use App\Models\Backend\Media;

class LessonDetailAttachment extends Base
{
    public $fillable = [
        'lesson_detail_id',
        'media_id',
        'type',
    ];

    public $visible = [
        'id',
        'lesson_detail_id',
        'media_id',
        'type',
    ];

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function createMany($input)
    {
        array_map(function ($item) {
            $this->create($item);
        }, $input);
    }

    public function editMany($input, $lesson_detail_id)
    {
        $input_media_id = data_get($input, '*.media_id');

        $old = $this
            ->select('id', 'media_id')
            ->where('lesson_detail_id', $lesson_detail_id)
            ->get()
            ->pluck('media_id')
            ->toArray();

        $delete_media_id = array_diff($old, $input_media_id);
        $create_media_id = array_diff($input_media_id, $old);
        
        foreach ($input as $item) {
            $media_id = $item['media_id'];
            if (in_array($media_id, $create_media_id)) {
                $this->create($item);
            }
        }

        $this
            ->where('lesson_detail_id', $lesson_detail_id)
            ->whereIn('media_id', $delete_media_id)
            ->delete('media_id');
    }
}
