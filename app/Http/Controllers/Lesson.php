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
        $lessons = $this->model->getLessons();
        return $this->render('lesson', compact('lessons'));
    }

    public function getDetail($lesson_id)
    {
        $lessons = $this->model->getLessonByLessonId($lesson_id);
        return $this->render('detail', compact('lessons'));
    }
}
