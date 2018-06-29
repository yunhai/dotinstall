<?php

namespace App\Http\Controllers\Backend;

class Home
{
    public function dashboard()
    {
        return view('backend.home.dashboard');
    }
}
