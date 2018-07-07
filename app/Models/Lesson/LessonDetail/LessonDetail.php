<?php

namespace App\Models\Lesson\LessonDetail;

use App\Models\Base;
use App\Models\Media;

class LessonDetail extends Base
{
    public function resources()
    {
        return $this->hasMany(LessonDetailAttachment::class)->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE);
    }
    
    public function source_codes()
    {
        return $this->hasMany(LessonDetailAttachment::class)->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE);
    }

    public function videos()
    {
        return $this->hasMany(Media::class, 'id', 'video');
    }

    public function posters()
    {
        return $this->hasMany(Media::class, 'id', 'poster');
    }
    
    public function getAll($lesson_id)
    {
        $with = ['posters',  'videos', 'source_codes', 'resources'];
        return $this::with($with)
                        ->where('lesson_id', $lesson_id)
                        ->orderBy('sort')
                        ->get()
                        ->toArray();
    }
}
