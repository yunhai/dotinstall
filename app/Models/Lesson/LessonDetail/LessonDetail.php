<?php

namespace App\Models\Lesson\LessonDetail;

use App\Models\Base;
use App\Models\Media;

class LessonDetail extends Base
{
    public function resources()
    {
        return $this->hasMany(LessonDetailAttachment::class)
                    ->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE);
    }

    public function source_codes()
    {
        return $this->hasMany(LessonDetailAttachment::class)
                ->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE);
    }

    public function source_code_contents()
    {
        return $this->hasMany(LessonDetailAttachment::class)
                    ->where('ref_id', '<>', 0)
                    ->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT);
    }

    public function videos()
    {
        return $this->hasMany(Media::class, 'id', 'video');
    }

    public function posters()
    {
        return $this->hasMany(Media::class, 'id', 'poster');
    }

    public function scopeEnable($query)
    {
        $query->where('mode', MODE_ENABLE);
    }

    public function getAll($lesson_id)
    {
        $with = ['posters',  'videos', 'source_code_contents', 'resources'];
        return $this::with($with)
                        ->where('lesson_id', $lesson_id)
                        ->orderBy('sort')
                        ->enable()
                        ->get()
                        ->toArray();
    }
}
