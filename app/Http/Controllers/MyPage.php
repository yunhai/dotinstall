<?php

namespace App\Http\Controllers;

use App\Models\User\UserStat as UserStatModel;
use Auth;

class MyPage extends Base
{
    public function getMyPage()
    {
        $user_id = Auth::check() ? Auth::user()->id : 0;

        $stat = $this->getUserStat($user_id);
        return $this->render('mypage', compact('stat'));
    }

    private function getUserStat(int $user_id)
    {
        $model = new UserStatModel();
        $stat = $model->getByUserId($user_id);

        $result = [
            'closed_lesson_detail_count' => 0,
            'date_count' => 0,
            'duration' => '0:00:00'
        ];

        if ($stat) {
            $result = [
                'closed_lesson_detail_count' => $stat['closed_lesson_detail_count'],
                'date_count' => $stat['learning_date_count'],
                'duration' => $this->formatSecond($stat['learning_duration']),
            ];
        }

        return $result;
    }

    private function formatSecond(int $second)
    {
        $t = round($second);
        return sprintf('%02d:%02d:%02d', ($t / 3600), ($t / 60 % 60), $t % 60);
    }
}
