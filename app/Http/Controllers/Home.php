<?php

namespace App\Http\Controllers;

use App\Models\Lesson\Lesson as LessonModel;

class Home extends Base
{
    public function __construct(
        LessonModel $lesson_model
    ) {
        $this->model = $lesson_model;
    }

    public function index()
    {
        $lessons = $this->model->getLessonsForHome();
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
}
