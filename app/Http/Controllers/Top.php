<?php

namespace App\Http\Controllers;

use App\Models\Lesson\Lesson as LessonModel;
use App\Models\User\UserLessonDetail as UserLessonDetailModel;
use App\Models\YoutubeLink as YoutubeLink;

use Auth;

class Top extends Base
{
    public function __construct(
        LessonModel $lesson_model,
        UserLessonDetailModel $user_lesson_detail_model,
        YoutubeLink $youtube_link
    ) {
        $this->model = $lesson_model;
        $this->user_lesson_detail_model = $user_lesson_detail_model;
        $this->youtube_link = $youtube_link;
    }

    public function index()
    {
        $lessons = $this->model->getLessonsForHome();
        if ($lessons) {
            $lesson_details = $lessons[0]['lesson_details'];
            $user_id = Auth::check() ? Auth::user()->id : 0;
            foreach ($lesson_details as $key => $detail) {
                $lesson_details[$key]['is_closeable'] = $user_id
                        && !$this->user_lesson_detail_model->closed($user_id, $detail['lesson_id'], $detail['id']);
            }

            $lessons[0]['lesson_details'] = $lesson_details;
        }

        $youtube_link = $this->youtube_link->random(1);
        return $this->render('top', compact('lessons', 'youtube_link'));
    }
}
