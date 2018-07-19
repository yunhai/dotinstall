<?php

namespace App\Models\Lesson\LessonDetail;

use App\Models\Backend\Base;
use App\Models\Backend\Media;

class LessonDetailAttachment extends Base
{
    public $fillable = [
        'lesson_detail_id',
        'media_id',
        'ref_id',
        'type',
        'language',
    ];

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function getResource(int $lesson_detail_id)
    {
        return $this->with(['media'])
                    ->where('lesson_detail_id', $lesson_detail_id)
                    ->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE)
                    ->get();
    }
}
