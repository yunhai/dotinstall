<?php

namespace App\Models;

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

        if (!empty($lessons)) {
            $lessons = $lessons->toArray();
        }
        return $lessons;
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
        $lessons = $this::with(['lesson_details', 'lesson_details.media', 'ms_categories'])
        ->where('id', $lesson_id)
        ->first();
        if (!empty($lessons)) {
            $lessons = $lessons->toArray();
        }
        return $lessons;
    }
}
