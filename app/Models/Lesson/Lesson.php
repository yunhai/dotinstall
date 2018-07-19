<?php

namespace App\Models\Lesson;

use App\Models\Base;
use App\Models\Lesson\LessonDetail\LessonDetail;

class Lesson extends Base
{
    public function lesson_details()
    {
        return $this->hasMany(LessonDetail::class)
                    ->enable();
    }

    public function ms_categories()
    {
        return $this->hasOne('App\Models\MsCategory', 'id', 'category_id');
    }

    public function scopeEnable($query)
    {
        $query->where('mode', MODE_ENABLE);
    }

    public function getLessonsForHome()
    {
        $with = [
            'lesson_details.videos',
            'lesson_details.posters',
            'lesson_details.source_code_contents',
            'lesson_details.resources',
            'ms_categories'
        ];
        return $this::with($with)
                    ->enable()
                    ->orderBy('id', 'desc')
                    ->get()
                    ->toArray();
    }

    public function getLessons()
    {
        $lessons = $this::with(['ms_categories'])
                        ->enable()
                        ->orderBy('id', 'desc')
                        ->get();
        if (!empty($lessons)) {
            $lessons = $lessons->toArray();
        }
        return $lessons;
    }

    public function getLessonByLessonId($lesson_id)
    {
        $with = ['lesson_details.source_code_contents', 'lesson_details.resources', 'lesson_details.posters', 'ms_categories'];
        return $this::with($with)
                    ->where('id', $lesson_id)
                    ->enable()
                    ->first()
                    ->toArray();
    }
}
