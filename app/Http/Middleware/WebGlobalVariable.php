<?php

namespace App\Http\Middleware;

use App\Models\Lesson\Lesson;
use Closure;
use Illuminate\Support\Facades\View;
use Auth;

class WebGlobalVariable
{
    public function handle($request, Closure $next)
    {
        $lesson_model = new Lesson();
        View::share('global_total_lessons', $lesson_model->countLesson());
        
        View::share('name', $this->userName());

        return $next($request);
    }
    
    public function userName() {
	    if (Auth::check()) {
            return strstr(Auth::user()->name, '@', true) == true ? strstr(Auth::user()->name, '@', true) : Auth::user()->name;
        }
    }
}
