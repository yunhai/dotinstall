<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;

class Base extends Controller
{
    protected $model = null;

    protected function render(string $view, array $option = [])
    {
        return view($view, $option);
    }

    protected function json(array $data = [])
    {
        return response()->json($data);
    }

    protected function redirect(string $route_name, array $option = [])
    {
        return redirect()->route($route_name, $option);
    }

    protected function back(string $route_name, array $option = [])
    {
        if (Request::server('HTTP_REFERER')) {
            return redirect()->back();
        };
        return $this->redirect($route_name, $option);
    }

    protected function totalLessons()
    {
        return Lesson::count();
    }
}
