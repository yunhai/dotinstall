<?php

namespace App\Http\Middleware;

use App\Models\Lesson\Lesson;
use Closure;
use Illuminate\Support\Facades\View;

class WebGlobalVariable
{
    public function handle($request, Closure $next)
    {
        $lesson_model = new Lesson();
        View::share('global_total_lessons', $lesson_model->countLesson());

        return $next($request);
    }
}
