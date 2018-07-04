<?php

namespace App\Http\Controllers;
use App\Models\Lesson as LessonModel;

class Home extends Controller
{
    public function __construct(
        LessonModel $lesson_model
    ) {
        $this->model = $lesson_model;
    }
    
    public function index()
    {
        $lessons = $this->model::with(['lesson_details' => function($q) {
            $q->take(20);
        }, 'lesson_details.media'])
        ->inRandomOrder(2)
        ->get();
        if (!empty($lessons)) {
            $lessons = $lessons->toArray();
        }
        return \View::make('index')->with(compact('lessons'));
    }
    
    public function getTerms()
    {
        return view('terms');
    }
    
    public function getPrivacy()
    {
        return view('privacy');
    }
    
    public function getContact()
    {
        return view('contact');
    }
}
