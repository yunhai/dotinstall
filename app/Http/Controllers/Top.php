<?php

namespace App\Http\Controllers;

use App\Models\Lesson\Lesson as LessonModel;
use App\Models\Media as MediaModel;
use App\Models\MsCategory as MsCategoryModel;
use App\Models\User\UserLesson as UserLessonModel;
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
        UserLessonModel $user_lesson_model,
        YoutubeLink $youtube_link
    ) {
        $this->model = $lesson_model;
        $this->user_lesson_detail_model = $user_lesson_detail_model;
        $this->user_lesson_model = $user_lesson_model;
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
        $filter_form = $this->filterForm($input);
        $lesson_info = [];
        if ($user_id) {
            $lessons = $this->getLogedInLesson($input);
            $lesson_info = $this->lessonInfo($lessons);
        } else {
            $lessons = $this->getUnLogInLesson();
        }

        $youtube_link = $this->youtube_link->where('mode', MODE_ENABLE)->inRandomOrder()->first();
        return $this->render('top', compact('lessons', 'youtube_link', 'filter_form', 'lesson_info'));
    }

    private function filterForm(array $input_value = [])
    {
        $model = new MsCategoryModel();
        $category = $model->getList();

        $difficulty = config('master.lesson.difficulty');
        return compact('category', 'difficulty', 'input_value');
    }

    private function getLogedInLesson(array $filter = [])
    {
        $result = [];
        $lessons = $this->model->getLessons($filter);
        if ($lessons) {
            $lesson_id = data_get($lessons, '*.id');
            $lessons = $this->lessonStat($lessons, $lesson_id);
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

    private function lessonStat(array $lessons = [], array $lesson_id_list = [])
    {
        $lesson_user_count_list = $this->user_lesson_model->countUserByLessonIdList($lesson_id_list);

        $user_id = Auth::id() ?: 0;
        $data = $this->user_lesson_detail_model->getByLessonId($user_id, $lesson_id_list);

        $lesson_detail_close_list = [];
        foreach ($data as $item) {
            $lesson_id = $item['lesson_id'];
            $user_lesson_detail_mode = $item['mode'];
            if (empty($lesson_detail_close_list[$lesson_id])) {
                $lesson_detail_close_list[$lesson_id] = 0;
            }
            if ($user_lesson_detail_mode == USER_LESSON_DETAIL_MODE_CLOSE) {
                $lesson_detail_close_list[$lesson_id]++;
            }
        }

        foreach ($lessons as &$item) {
            $lesson_id = $item['id'];
            $item['lesson_learning_count'] = $lesson_user_count_list[$lesson_id] ?? 0;
            $item['lesson_detail_close_count'] = $lesson_detail_close_list[$lesson_id] ?? 0;
        }

        return $lessons;
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
    
    private function lessonInfo(array $lessons = [])
    {
        $lesson_total = $video_total = 0;
        foreach ($lessons as $item) {
            foreach ($item as $item_detail) {
                $lesson_total += count($item_detail);
                foreach ($item_detail as $detail) {
                    $video_total += $detail['video_count'];
                };
            };
        };
        
        return compact('lesson_total', 'video_total');
    }

    private function getMedia($lessons)
    {
        $media_id = data_get($lessons, '*.lesson_details.*.source_code_contents.*.media_id');

        $tmp = data_get($lessons, '*.lesson_details.*.resources.*.media_id');
        $media_id = array_merge($media_id, $tmp);

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

            $resources_item = [];
            if (!empty($detail['resources'])) {
                foreach ($detail['resources'] as $index => $item) {
                    $resources_item[$index] = $media[$item['media_id']] ?? [];
                }
            }
            $lesson_details[$key]['resources_item'] = $resources_item;
            $lesson_details[$key]['popup'] = $detail['source_code_contents'] ||
                                            $detail['resources'];
        }

        $lesson['lesson_details'] = $lesson_details;
        return $lesson;
    }
}
