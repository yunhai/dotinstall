<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Base;
use App\Models\Lesson\Lesson as LessonModel;
use App\Models\User\UserLesson as UserLessonModel;
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
        $lesson_id = data_get($lessons, '*.id');
        $stat = $this->user_lesson_model->getStat($lesson_id);
        return $this->render('lesson.index', compact('lessons', 'stat'));
    }

    public function getDetail($lesson_id)
    {
        $user_id = Auth::check() ? Auth::user()->id : 0;
        if ($user_id) {
            if (!$this->user_lesson_model->enrolled($user_id, $lesson_id)) {
                $this->user_lesson_model->enroll($user_id, $lesson_id);
            }
        }

        $target = $this->model->getLessonByLessonId($lesson_id);
        $stat = $this->user_lesson_model->getStat([$lesson_id]);

        return $this->render('lesson.detail', compact('target', 'stat'));
    }

    public function getEnroll($lesson_id)
    {
        $user_id = Auth::user()->id;

        if (!$this->user_lesson_model->enrolled($user_id, $lesson_id)) {
            $this->user_lesson_model->enroll($user_id, $lesson_id);
        }

        return $this->back('lesson.detail', ['lesson_id' => $lesson_id]);
    }

    public function getClose($lesson_id)
    {
        $user_id = Auth::user()->id;

        if (!$this->user_lesson_model->closed($user_id, $lesson_id)) {
            $this->user_lesson_model->close($user_id, $lesson_id);
        }

        return $this->back('lesson.detail', ['lesson_id' => $lesson_id]);
    }
}
