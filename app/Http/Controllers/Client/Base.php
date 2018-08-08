<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class Base extends Controller
{
    protected $model = null;

    protected function render($view, $option = [])
    {
        return view("client.{$view}", $option);
    }

    protected function json(array $data = [])
    {
        return response()->json($data);
    }
}
