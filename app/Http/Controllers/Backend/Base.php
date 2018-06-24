<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class Base extends Controller
{
    protected $model = null;

    protected function render($view, $option = []) {
        return view("backend.{$view}", $option);
    }
}
