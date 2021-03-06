<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Announcement;
use App\Models\Lesson\Lesson as LessonModel;
use App\Models\Media as MediaModel;
use App\Models\MsCategory as MsCategoryModel;
use App\Models\User\UserLesson as UserLessonModel;
use App\Models\User\UserLessonDetail as UserLessonDetailModel;
use App\Models\YoutubeLink as YoutubeLink;

use Auth;
use Carbon\Carbon;
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

        $lessons = $this->getLesson();
        // dd($lessons);
        //$this->getUnLogInLesson();

        $youtube_link = $this->youtube_link->random();
        shuffle($youtube_link);

        $announcement = $this->getAnnouncement();

        $model = new Ad();
        $ad = $model->random();
        return $this->render('top', compact('lessons', 'youtube_link', 'filter_form', 'lesson_info', 'announcement', 'ad'));
    }

    private function getLesson()
    {
        $result = [
            LESSON_DIFFICULTY_NEWBIE => [],
            LESSON_DIFFICULTY_BEGINNER => [],
            LESSON_DIFFICULTY_INTERMEDIATE => [],
            LESSON_DIFFICULTY_ADVANCE => [],
        ];
        $data = $this->model->getLessonForTop();
        if ($data) {
            $data = $this->lessonStat($data);
            foreach ($data as $item) {
                array_push($result[$item['difficulty']], $item);
            }
        }
        return $result;
    }

    private function lessonStat(array $lessons = [])
    {
        $lesson_id_list = data_get($lessons, '*.id');
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
            $item['is_finished'] = $item['lesson_detail_close_count'] >= $item['video_count'] ? 1 : 0;
        }

        return $lessons;
    }

    private function getAnnouncement()
    {
        $model = new Announcement();
        $announcement = $model->list(4);

        $result = [];
        foreach ($announcement as $item) {
            $post_date = substr($item['post_date'], 0, 10);
            $item['post_date'] = Carbon::createFromFormat('Y-m-d', $post_date)
                                        ->format('Y年m月d日');
            array_unshift($result, $item);
        }
        return $result;
    }


    public function search(Request $request)
    {
        $input = $request->all();

        if (!empty($input['token'])) {
            $affiliator_token = $input['token'];
            session(compact('affiliator_token'));
        }

        $user_id = Auth::id() ?: 0;
        $filter_form = $this->filterForm($input);
        $lesson_info = [];
        $lessons = $this->getUnLogInLesson();

        $youtube_link = $this->youtube_link->random();
        shuffle($youtube_link);

        $announcement = $this->getAnnouncement();

        $model = new Ad();
        $ad = $model->random();
        return $this->render('search', compact('lessons', 'youtube_link', 'filter_form', 'lesson_info', 'announcement', 'ad'));
    }
    
    // public function AjaxLesson()
    // {
    //     $filter_form = $this->filterForm();
    //     $lessons = $this->getUnLogInLesson();
    //
    //     return $this->render('top/ajax_lesson', compact('lessons', 'filter_form'));
    // }

    // private function getUnLogInLesson()
    // {
    //     $paginator = $this->model->getLessonsForHome();
    //     if ($paginator->items()) {
    //         $lessons = $paginator->items();
    //
    //         $media = $this->getMedia($lessons);
    //         $user_id = Auth::id() ?: 0;
    //         foreach ($lessons as $index => $item) {
    //             $item = $item->toArray();
    //             $lessons[$index] = $this->format($item, $media, $user_id);
    //         }
    //
    //         $current_page = $paginator->currentPage();
    //         $last_page = $paginator->lastPage();
    //         return [
    //             'data' => $lessons,
    //             'current_page' => $current_page,
    //             'last_page' => $last_page
    //         ];
    //     }
    //
    //     return [
    //         'data' => [],
    //         'current_page' => 0,
    //         'total_page' => 0
    //     ];
    // }

    private function filterForm(array $input_value = [])
    {
        $model = new MsCategoryModel();
        $category = $model->getList();

        $difficulty = config('master.lesson.difficulty');
        return compact('category', 'difficulty', 'input_value');
    }

    // private function getLogedInLesson(array $filter = [])
    // {
    //     $tmp = [];
    //     $lessons = $this->model->getLessons($filter);
    //     if ($lessons) {
    //         $lesson_id = data_get($lessons, '*.id');
    //         $lessons = $this->lessonStat($lessons, $lesson_id);
    //         foreach ($lessons as $item) {
    //             $difficulty = $item['difficulty'];
    //             $category = $item['category_id'];
    //
    //             if (!isset($tmp[$difficulty])) {
    //                 $tmp[$difficulty] = [
    //                     $category => []
    //                 ];
    //             } elseif (!isset($tmp[$difficulty][$category])) {
    //                 $tmp[$difficulty][$category] = [];
    //             }
    //             array_push($tmp[$difficulty][$category], $item);
    //         };
    //     }
    //
    //     $sort_order = [
    //         LESSON_DIFFICULTY_NEWBIE,
    //         LESSON_DIFFICULTY_BEGINNER,
    //         LESSON_DIFFICULTY_INTERMEDIATE,
    //         LESSON_DIFFICULTY_ADVANCE,
    //     ];
    //     $result = [];
    //     foreach ($sort_order as $item) {
    //         if (!empty($tmp[$item])) {
    //             $result[$item] = $tmp[$item];
    //         }
    //     }
    //     return $result;
    // }

    // private function lessonStat(array $lessons = [], array $lesson_id_list = [])
    // {
    //     $lesson_user_count_list = $this->user_lesson_model->countUserByLessonIdList($lesson_id_list);
    //
    //     $user_id = Auth::id() ?: 0;
    //     $data = $this->user_lesson_detail_model->getByLessonId($user_id, $lesson_id_list);
    //
    //     $lesson_detail_close_list = [];
    //     foreach ($data as $item) {
    //         $lesson_id = $item['lesson_id'];
    //         $user_lesson_detail_mode = $item['mode'];
    //         if (empty($lesson_detail_close_list[$lesson_id])) {
    //             $lesson_detail_close_list[$lesson_id] = 0;
    //         }
    //         if ($user_lesson_detail_mode == USER_LESSON_DETAIL_MODE_CLOSE) {
    //             $lesson_detail_close_list[$lesson_id]++;
    //         }
    //     }
    //
    //     foreach ($lessons as &$item) {
    //         $lesson_id = $item['id'];
    //         $item['lesson_learning_count'] = $lesson_user_count_list[$lesson_id] ?? 0;
    //         $item['lesson_detail_close_count'] = $lesson_detail_close_list[$lesson_id] ?? 0;
    //     }
    //
    //     return $lessons;
    // }

    // private function lessonInfo(array $lessons = [])
    // {
    //     $lesson_total = $video_total = 0;
    //     foreach ($lessons as $item) {
    //         foreach ($item as $item_detail) {
    //             $lesson_total += count($item_detail);
    //             foreach ($item_detail as $detail) {
    //                 $video_total += $detail['video_count'];
    //             };
    //         };
    //     };
    //
    //     return compact('lesson_total', 'video_total');
    // }

    // private function getMedia($lessons)
    // {
    //     $media_id = data_get($lessons, '*.lesson_details.*.source_code_contents.*.media_id');
    //
    //     $tmp = data_get($lessons, '*.lesson_details.*.resources.*.media_id');
    //     $media_id = array_merge($media_id, $tmp);
    //
    //     $tmp = (new MediaModel)->retrieve($media_id);
    //     $media = [];
    //     foreach ($tmp as $index => $item) {
    //         $media[$item['id']] = $item;
    //     }
    //     return $media;
    // }

    // private function format(array $lesson, $media, $user_id)
    // {
    //     $storage = Storage::disk('media');
    //     $lesson_details = $lesson['lesson_details'];
    //
    //     $user_diamond_flag = (Auth::check() && Auth::user()->grade == USER_GRADE_DIAMOND);
    //
    //     foreach ($lesson_details as $key => $detail) {
    //         $lesson_details[$key]['is_closeable'] = $user_id
    //                 && !$this->user_lesson_detail_model->closed($user_id, $detail['lesson_id'], $detail['id']);
    //
    //         if (empty($detail['source_code_contents'])) {
    //             $detail['source_code_contents'] = [];
    //         } else {
    //             if ($user_diamond_flag || $detail['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE')) {
    //                 foreach ($detail['source_code_contents'] as $index => $item) {
    //                     $path = $media[$item['media_id']]['path'] ?? '';
    //                     if ($path && $storage->exists($path)) {
    //                         $item['filename'] = $media[$item['media_id']]['original_name'];
    //                         $item['content'] = $storage->get($path);
    //                         $lesson_details[$key]['source_code_contents'][$index] = $item;
    //                     } else {
    //                         unset($detail['source_code_contents'][$index]);
    //                         unset($lesson_details[$key]['source_code_contents'][$index]);
    //                     }
    //                 }
    //             } else {
    //                 $detail['source_code_contents'] = [];
    //             }
    //         }
    //
    //         $resources_item = [];
    //         if (!empty($detail['resources'])) {
    //             foreach ($detail['resources'] as $index => $item) {
    //                 $resources_item[$index] = $media[$item['media_id']] ?? [];
    //             }
    //         }
    //         $lesson_details[$key]['resources_item'] = $resources_item;
    //         $lesson_details[$key]['popup'] = $detail['source_code_contents'] || $detail['resources'];
    //     }
    //
    //     $lesson['lesson_details'] = $lesson_details;
    //     return $lesson;
    // }
}
