<?php

namespace App\Http\Controllers;

use App\Models\Lesson as LessonModel;

class Lesson extends Base
{
    public function __construct(
        LessonModel $lesson_model
    ) {
        $this->model = $lesson_model;
    }
    public function getLesson()
    {
        $lessons = $this->model::with(['ms_categories'])->get();
        if (!empty($lessons)) {
            $lessons = $lessons->toArray();
        }

        return $this->render('lesson', compact('lessons'));
    }

    public function getDetail($lesson_id)
    {
        $lessons = $this->model::with(['lesson_details', 'lesson_details.media', 'ms_categories'])
        ->where('id', $lesson_id)
        ->get();
        if (!empty($lessons)) {
            $lessons = $lessons->toArray();
        }
        return $this->render('detail', compact('lessons'));
    }
}
