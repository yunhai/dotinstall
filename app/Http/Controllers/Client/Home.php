<?php

namespace App\Http\Controllers\Client;

class Home
{
    public function dashboard()
    {
        return view('client.home.dashboard');
    }
}
