<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Lesson extends Controller
{
    public function getLesson()
    {
        return view('lesson');
    }
    
    public function getDetail()
    {
        return view('detail');
    }
}
