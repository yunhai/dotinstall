<?php

namespace App\Http\Controllers;

use App\Models\Lesson\Lesson as LessonModel;
use App\Models\Media as MediaModel;
use App\Models\MsCategory as MsCategoryModel;
use App\Models\User\UserLessonDetail as UserLessonDetailModel;
use App\Models\YoutubeLink as YoutubeLink;
use Auth;
use Illuminate\Http\Request;
use Storage;

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

    public function index(Request $request)
    {
        $input = $request->all();

        if (!empty($input['token'])) {
            $affiliator_token = $input['token'];
            session(compact('affiliator_token'));
        }

        $user_id = Auth::id() ?: 0;
		$filter_form = $this->filterForm();
        if ($user_id) {
            $lessons = $this->getLogedInLesson($input);
        } else {
            $lessons = $this->getUnLogInLesson();
        }
		
        $youtube_link = $this->youtube_link->where('mode', MODE_ENABLE)->inRandomOrder()->first();
        return $this->render('top', compact('lessons', 'youtube_link', 'filter_form'));
    }

    private function filterForm()
    {
        $model = new MsCategoryModel();
        $category = $model->getList();

        $difficulty = config('master.lesson.difficulty');
        return compact('category', 'difficulty');
    }

    private function getLogedInLesson(array $filter = [])
    {
        $result = [];
        $lessons = $this->model->getLessons($filter);
        if ($lessons) {
            foreach ($lessons as $item) {
                $difficulty = $item['difficulty'];
                $category = $item['category_id'];

                if (!isset($result[$difficulty])) {
                    $result[$difficulty] = [
                        $category => []
                    ];
                } elseif (!isset($result[$difficulty][$category])) {
                    $result[$difficulty][$category] = [];
                }
                array_push($result[$difficulty][$category], $item);
            };
        }
        return $result;
    }

    private function getUnLogInLesson()
    {
        $lessons = $this->model->getLessonsForHome();
        if ($lessons) {
            $media = $this->getMedia($lessons);
            $user_id = Auth::id() ?: 0;
            foreach ($lessons as $index => $item) {
                $lessons[$index] = $this->format($item, $media, $user_id);
            }
        }
        return $lessons;
    }

    private function getMedia($lessons)
    {
        $media_id = data_get($lessons, '*.lesson_details.*.source_code_contents.*.media_id');

        $tmp = (new MediaModel)->retrieve($media_id);
        $media = [];
        foreach ($tmp as $index => $item) {
            $media[$item['id']] = $item;
        }
        return $media;
    }

    private function format(array $lesson, $media, $user_id)
    {
        $storage = Storage::disk('media');
        $lesson_details = $lesson['lesson_details'];

        foreach ($lesson_details as $key => $detail) {
            $lesson_details[$key]['is_closeable'] = $user_id
                    && !$this->user_lesson_detail_model->closed($user_id, $detail['lesson_id'], $detail['id']);

            if (empty($detail['source_code_contents'])) {
                $detail['source_code_contents'] = [];
            } else {
                foreach ($detail['source_code_contents'] as $index => $item) {
                    $path = $media[$item['media_id']]['path'] ?? '';
                    if ($path && $storage->exists($path)) {
                        $item['filename'] = $media[$item['media_id']]['original_name'];
                        $item['content'] = $storage->get($path);
                        $lesson_details[$key]['source_code_contents'][$index] = $item;
                    } else {
                        unset($detail['source_code_contents'][$index]);
                        unset($lesson_details[$key]['source_code_contents'][$index]);
                    }
                }
            }

            $lesson_details[$key]['popup'] = $detail['source_code_contents'] ||
                                            $detail['resources'];
        }

        $lesson['lesson_details'] = $lesson_details;
        return $lesson;
    }
}
