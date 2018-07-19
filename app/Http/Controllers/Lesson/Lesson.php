<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Base;
use App\Models\Lesson\Lesson as LessonModel;
use App\Models\Media as MediaModel;
use App\Models\User\UserLesson as UserLessonModel;
use App\Models\User\UserLessonDetail as UserLessonDetailModel;
use Auth;
use Storage;

class Lesson extends Base
{
    public function __construct(
        LessonModel $lesson_model,
        UserLessonDetailModel $user_lesson_detail_model,
        UserLessonModel $user_lesson_model
    ) {
        $this->model = $lesson_model;
        $this->user_lesson_model = $user_lesson_model;
        $this->user_lesson_detail_model = $user_lesson_detail_model;
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
        if ($target) {
            $media = $this->getMedia($target);
            $target = $this->format($target, $media, $user_id);
        }

        $stat = $this->user_lesson_model->getStat([$lesson_id]);
        return $this->render('lesson.detail', compact('target', 'stat'));
    }

    private function getMedia($lessons)
    {
        $media_id = data_get($lessons, 'lesson_details.*.source_code_contents.*.media_id');

        $tmp = (new MediaModel)->retrieve($media_id);
        $media = [];
        foreach ($tmp as $index => $item) {
            $media[$item['id']] = $item;
        }

        return $media;
    }

    private function format(array $lesson, $media, $user_id)
    {
        $lesson_details = $lesson['lesson_details'];

        foreach ($lesson_details as $key => $detail) {
            $lesson_details[$key]['is_closeable'] = $user_id
                    && !$this->user_lesson_detail_model->closed($user_id, $detail['lesson_id'], $detail['id']);

            foreach ($detail['source_code_contents'] as $index => $item) {
                $path = $media[$item['media_id']]['path'] ?? '';

                $item['filename'] = $media[$item['media_id']]['original_name'];
                $item['content'] = Storage::disk('media')->get($path);

                $lesson_details[$key]['source_code_contents'][$index] = $item;
            }

            $lesson_details[$key]['popup'] = $detail['source_code_contents'] ||
                                            $detail['resources'];
        }

        $lesson['lesson_details'] = $lesson_details;
        return $lesson;
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
