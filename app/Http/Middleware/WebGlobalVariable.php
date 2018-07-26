<?php

namespace App\Http\Middleware;

use App\Models\Lesson\Lesson;
use Closure;
use Illuminate\Support\Facades\View;

class WebGlobalVariable
{
    public function handle($request, Closure $next)
    {
        View::share('global_total_lessons', Lesson::count());

        return $next($request);
    }
}
