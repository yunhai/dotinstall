<?php

namespace App\Http\Controllers\Backend;

class Home extends Base
{
    public function dashboard()
    {
        return $this->render('home.dashboard');
    }
}
