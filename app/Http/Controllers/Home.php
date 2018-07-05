<?php

namespace App\Http\Controllers;

use App\Models\Lesson as LessonModel;

class Home extends Base
{
    public function __construct(
        LessonModel $lesson_model
    ) {
        $this->model = $lesson_model;
    }

    public function index()
    {
        $lessons = $this->model::with(['lesson_details' => function ($q) {
            $q->take(20);
        }, 'lesson_details.media'])
        ->inRandomOrder(2)
        ->get();
        if (!empty($lessons)) {
            $lessons = $lessons->toArray();
        }
        return $this->render('index', compact('lessons'));
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
}
