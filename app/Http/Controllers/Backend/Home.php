<?php

namespace App\Http\Controllers\Backend;

class Home
{
    public function dashboard()
    {
        return view('backend.home.dashboard');
    }
    
    public function login()
    {
        return view('backend.home.login');
    }
    
    public function changePassword()
    {
        return view('backend.home.changePassword');
    }
    
    public function main()
    {
        return view('backend.home.main');
    }
    
    public function list()
    {
        return view('backend.home.list');
    }
    
    public function detail()
    {
        return view('backend.home.detail');
    }
}
