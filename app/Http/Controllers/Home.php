<?php

namespace App\Http\Controllers;

class Home extends Base
{
    public function getMyPage()
    {
        return $this->render('home');
    }
}
