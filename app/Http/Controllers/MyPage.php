<?php

namespace App\Http\Controllers;

use App\Models\User\UserStat as UserStatModel;
use App\Models\User\UserPayment as UserPaymentModel;
use App\Models\Notification as NotificationModel;
use Auth;
use Carbon\Carbon;

class MyPage extends Base
{
    public function getMyPage()
    {
        $user = Auth::user()->toArray();
        $user_id = $user['id'];

        $stat = $this->getUserStat($user_id);
        $notifications = $this->getNotification(5);
        $next_pay_date = $this->getNextPaymentDate($user_id);
        return $this->render('mypage', compact('stat', 'notifications', 'next_pay_date'));
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

    private function getNotification($limit = 4)
    {
        $model = new NotificationModel();
        $result = $model->list($limit);
        foreach ($result as &$item) {
            $post_date = Carbon::createFromFormat('Y-m-d H:i:s', $item['post_date']);
            $item['post_date_short'] = $post_date->format('m/d');
            $item['post_date_long'] = $post_date->format('Y/m/d H:i');
        }

        return $result;
    }

    private function getNextPaymentDate($user_id)
    {
        $model = new UserPaymentModel();
        $result = $model->getLastPaymentByUserId($user_id);

        return Carbon::createFromFormat('Y-m-d H:i:s', $result['stripe_time'])
                    ->addMonth()
                    ->format('Y年m月d日');
    }
}
