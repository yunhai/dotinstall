<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Announcement;
use App\Models\Lesson\Lesson as LessonModel;
use App\Models\Lesson\LessonDetail\LessonDetail as LessonDetailModel;
use App\Models\Media as MediaModel;
use App\Models\MsCategory as MsCategoryModel;
use App\Models\User\UserLesson as UserLessonModel;
use App\Models\User\UserLessonDetail as UserLessonDetailModel;
use App\Models\YoutubeLink as YoutubeLink;
use App\Models\MsCategory\MsCategoryAttribute as MsCategoryAttributeModel;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;

class Top extends Base
{
    public function __construct(
        LessonModel $lesson_model,
        LessonDetailModel $lesson_detail_model,
        UserLessonDetailModel $user_lesson_detail_model,
        UserLessonModel $user_lesson_model,
        YoutubeLink $youtube_link
    ) {
        $this->model = $lesson_model;
        $this->lesson_detail_model = $lesson_detail_model;
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
        $filter_form = $this->filterForm();

        $lessons = $this->getLesson();

        $youtube_link = $this->youtube_link->random();
        shuffle($youtube_link);

        $announcement = $this->getAnnouncement();

        $model = new Ad();
        $ad = $model->random();
        $category = $this->getCategoryAttribute();
        $category = $this->formatCategoryAttribute($category);
        $page = 'top';
        $option = compact(
                    'lessons',
                    'youtube_link',
                    'filter_form',
                    'announcement',
                    'ad',
                    'category',
                    'page'
                );

        return $this->render('top', $option);
    }

    public function search(Request $request)
    {
        $input = $request->all();
        $filter_form = $this->filterForm($input);

        $lessons = $this->searchLesson($input);
        $youtube_link = $this->youtube_link->random();
        shuffle($youtube_link);

        $announcement = $this->getAnnouncement();

        $model = new Ad();
        $ad = $model->random();
        $category = $this->getCategoryAttribute();

        $page = 'search';
        $option = compact(
                    'lessons',
                    'youtube_link',
                    'filter_form',
                    'announcement',
                    'ad',
                    'page'
                );

        return $this->render('top', $option);
    }

    public function ajaxFilterLesson(Request $request)
    {
        $fitler = $request->all();
        $lessons = $this->searchLesson($fitler);
        $filter_form = $this->filterForm();
        $option = compact(
                    'lessons',
                    'filter_form'
                );
        return $this->render('ajax.top.filter', $option);
    }

    private function searchLesson(array $input = [])
    {
        $lesson = $this->model->searchLessonForTop($input);
        $lesson_detail = $this->lesson_detail_model->searchLessonDetailForTop($input);
        return compact('lesson', 'lesson_detail');
    }

    private function getLesson()
    {
        $data = $this->model->getLessonForTop();
        if ($data) {
            $data = $this->lessonStat($data);
            foreach ($data as $item) {
                $category_id = $item['category_id'];
                $level = $item['difficulty'];

                if (empty($result[$category_id])) {
                    $result[$category_id] = [
                        LESSON_DIFFICULTY_NEWBIE => [],
                        LESSON_DIFFICULTY_BEGINNER => [],
                        LESSON_DIFFICULTY_INTERMEDIATE => [],
                        LESSON_DIFFICULTY_ADVANCE => [],
                    ];
                }
                $result[$category_id][$level] = $result[$category_id][$level] ?? [];
                array_push($result[$category_id][$level], $item);
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

    private function getCategoryAttribute()
    {
        $model = new MsCategoryAttributeModel();
        return $model->getAll();
    }

    private function formatCategoryAttribute(array $data = [])
    {
        $result = [];
        foreach ($data as $item) {
            $category_id = $item['ms_category_id'];
            $level = $item['level'];
            $result[$category_id][$level] = $item;
        }

        foreach ($result as &$list) {
            $list = array_chunk($list, 2);
        }

        return $result;
    }



    private function filterForm()
    {
        $model = new MsCategoryModel();
        $category = $model->getList();

        $difficulty = config('master.lesson.difficulty');
        return compact('category', 'difficulty', 'input_value');
    }
}
