<?php

namespace App\Models\Lesson\LessonDetail;

use App\Models\Base;
use App\Models\Media;
use App\Models\Lesson\Lesson;

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

    public function posters()
    {
        return $this->hasMany(Media::class, 'id', 'poster');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function scopeEnable($query)
    {
        $query->where('mode', MODE_ENABLE);
    }

    public function getAll($lesson_id)
    {
        $with = ['posters', 'source_code_contents', 'resources'];
        return $this::with($with)
                        ->where('lesson_id', $lesson_id)
                        ->orderBy('sort')
                        ->enable()
                        ->get()
                        ->toArray();
    }

    public function searchLessonDetailForTop(array $input = [])
    {
        $keyword = $input['keyword'] ?? '';
        return $this::with(['lesson'])
                    ->join('lessons', 'lessons.id', '=', 'lesson_details.lesson_id')
                    ->where('lesson_details.mode', MODE_ENABLE)
                    ->whereNull('lessons.deleted_at')
                    ->where(function ($query) use ($keyword) {
                        $query->where('lesson_details.name', 'like', "%{$keyword}%")
                            ->orWhere('lesson_details.caption', 'like', "%{$keyword}%");
                    })
                    ->orderBy('difficulty')
                    ->get()
                    ->toArray();
    }
}
