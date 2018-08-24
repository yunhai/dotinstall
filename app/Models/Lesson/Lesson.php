<?php

namespace App\Models\Lesson;

use App\Models\Base;
use App\Models\Lesson\LessonDetail\LessonDetail;

class Lesson extends Base
{
    public function lesson_details()
    {
        return $this->hasMany(LessonDetail::class)
                    ->orderBy('sort')
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
            'lesson_details.posters',
            'lesson_details.source_code_contents',
            'lesson_details.resources'
        ];
        return $this::with($with)
                    ->take(3)
                    ->enable()
                    ->orderBy('sort')
                    ->get()
                    ->toArray();
    }

    public function getLessons(array $filter = [])
    {
        $db = $this::with(['ms_categories'])
                        ->enable()
                        ->orderBy('sort');

        if ($filter) {
            if (!empty($filter['keyword'])) {
                $db->where('name', 'like', '%' . $filter['keyword'] . '%');
            }
            $map = [
                'category' => 'category_id',
                'difficulty' => 'difficulty',
            ];
            foreach ($map as $key => $name) {
                if (empty($filter[$key])) {
                    continue;
                }
                $db->where($name, $filter[$key]);
            }
        }

        $lessons = $db->get();
        if (!empty($lessons)) {
            $lessons = $lessons->toArray();
        }
        return $lessons;
    }

    public function getLessonByLessonId($lesson_id)
    {
        $with = [
            'lesson_details.source_code_contents',
            'lesson_details.resources',
            'lesson_details.posters'
        ];
        return $this::with($with)
                    ->where('id', $lesson_id)
                    ->enable()
                    ->first()
                    ->toArray();
    }

    public function countLesson()
    {
        return $this->enable()->count();
    }
}
