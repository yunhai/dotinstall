<?php

namespace App\Models;

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
}
