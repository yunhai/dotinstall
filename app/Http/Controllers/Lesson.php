<?php

namespace App\Http\Controllers;

use App\Models\Lesson as LessonModel;
use App\Models\UserLesson as UserLessonModel;
use Auth;

class Lesson extends Base
{
    public function __construct(
        LessonModel $lesson_model,
        UserLessonModel $user_lesson_model
    ) {
        $this->model = $lesson_model;
        $this->user_lesson_model = $user_lesson_model;
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

    public function getJoin($lesson_id)
    {
        $user_id = Auth::user()->id;
        $this->user_lesson_model->join($user_id, $lesson_id);
        return $this->redirect('lesson.detail', ['lesson_id' => $lesson_id]);
    }
}
