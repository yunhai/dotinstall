<?php

namespace App\Http\Controllers\Lesson\LessonDetail;

use App\Http\Controllers\Base;
use App\Models\Lesson\LessonDetail\LessonDetail as LessonDetailModel;
use App\Models\User\UserLessonDetail as UserLessonDetailModel;
use Auth;

class LessonDetail extends Base
{
    public function __construct(
        LessonDetailModel $lesson_detail_model,
        UserLessonDetailModel $user_lesson_detail_model
    ) {
        $this->model = $lesson_detail_model;
        $this->user_lesson_detail_model = $user_lesson_detail_model;
    }

    public function getDetail(int $lesson_id, int $lesson_detail_id)
    {
        $user_id = Auth::check() ? Auth::user()->id : 0;
        if ($user_id) {
            if (!$this->user_lesson_detail_model->learned($user_id, $lesson_id, $lesson_detail_id)) {
                $this->user_lesson_detail_model->learn($user_id, $lesson_id, $lesson_detail_id);
            }
        }
        $lesson_details = $this->model->getAll($lesson_id);

        foreach ($lesson_details as $key => $detail) {
            $lesson_details[$key]['is_closeable'] = $user_id
                && !$this->user_lesson_detail_model->closed($user_id, $detail['lesson_id'], $detail['id']);
        }

        $target = [];
        $prev_video = [];
        $next_video = [];

        $prev_id = -1;
        foreach ($lesson_details as $key => $detail) {
            if ($prev_id === $lesson_detail_id) {
                $next_video = $detail;
                break;
            }

            if ($detail['id'] === $lesson_detail_id) {
                $target = $detail;
                unset($lesson_details[$key]);
            } else {
                $prev_video = $detail;
            }

            $prev_id = $detail['id'];
        }

        return $this->render(
            'lesson.lesson_detail.detail',
            compact(
                'lesson_id',
                'lesson_detail_id',
                'lesson_details',
                'target',
                'prev_video',
                'next_video'
            )
        );
    }

    public function getClose(int $lesson_id, int $lesson_detail_id)
    {
        $user_id = Auth::user()->id;

        if (!$this->user_lesson_detail_model->closed($user_id, $lesson_id, $lesson_detail_id)) {
            $this->user_lesson_detail_model->close($user_id, $lesson_id, $lesson_detail_id);
        }

        return $this->back('lesson_detail.detail', ['lesson_id' => $lesson_id, 'lesson_detail_id' => $lesson_detail_id]);
    }
}
