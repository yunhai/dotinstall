<?php

namespace App\Http\Controllers;

use App\Models\Lesson\Lesson as LessonModel;
use App\Models\User\UserLessonDetail as UserLessonDetailModel;
use Auth;

class Home extends Base
{
    public function __construct(
        LessonModel $lesson_model,
        UserLessonDetailModel $user_lesson_detail_model
    ) {
        $this->model = $lesson_model;
        $this->user_lesson_detail_model = $user_lesson_detail_model;
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

        return $this->render('index', compact('lessons'));
    }

    public function getCompany()
    {
        return $this->render('company');
    }

    public function getTerms()
    {
        return $this->render('terms');
    }

    public function getPrivacy()
    {
        return $this->render('privacy');
    }

    public function getContact()
    {
        return $this->render('contact');
    }

    public function getStripe()
    {
        return $this->render('stripe');
    }

    public function getAffiliate()
    {
        return $this->render('affiliate');
    }

    public function getMyPage()
    {
        return $this->render('home');
    }
}
