<?php

namespace App\Http\Controllers;

class MyPage extends Base
{
    public function getMyPage()
    {
        return $this->render('mypage');
    }
}
