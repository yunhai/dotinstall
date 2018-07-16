<?php

namespace App\Models\Lesson;

use App\Models\Base;
use App\Models\Lesson\LessonDetail\LessonDetail;

class Lesson extends Base
{
    public function lesson_details()
    {
        return $this->hasMany(LessonDetail::class);
    }

    public function ms_categories()
    {
        return $this->hasOne('App\Models\MsCategory', 'id', 'category_id');
    }

    public function getLessonsForHome()
    {
        return $this::with(
            ['lesson_details' => function ($q) {
                $q->take(20);
            },
                'lesson_details.videos',
                'lesson_details.posters',
                'ms_categories'
            ]
        )
            ->inRandomOrder(2)
            ->get()
            ->toArray();
    }

    public function getLessons()
    {
        $lessons = $this::with(['ms_categories'])->get();
        if (!empty($lessons)) {
            $lessons = $lessons->toArray();
        }
        return $lessons;
    }

    public function getLessonByLessonId($lesson_id)
    {
        $with = ['lesson_details', 'lesson_details.posters', 'ms_categories'];
        return $this::with($with)
                        ->where('id', $lesson_id)
                        ->first()
                        ->toArray();
    }
}
