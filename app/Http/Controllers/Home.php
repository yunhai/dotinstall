<?php

namespace App\Http\Controllers;

class Home
{
    public function index()
    {
        return view('index');
    }
    
    public function getTerms()
    {
        return view('terms');
    }
    
    public function getPrivacy()
    {
        return view('privacy');
    }
    
    public function getContact()
    {
        return view('contact');
    }
}
