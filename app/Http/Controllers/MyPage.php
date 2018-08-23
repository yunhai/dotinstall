<?php

namespace App\Http\Controllers;

use App\Models\User\UserStat as UserStatModel;
use App\Models\User\UserPayment as UserPaymentModel;
use App\Models\Notification as NotificationModel;
use App\Models\Subscription;
use Auth;
use Carbon\Carbon;

class MyPage extends Base
{
    public function __construct(
        UserPaymentModel $user_payment_model,
        UserStatModel $user_stat,
        NotificationModel $notification
    ) {
        $this->user_payment_model = $user_payment_model;
        $this->user_stat = $user_stat;
        $this->notification = $notification;
    }

    public function getMyPage()
    {
        $user_id = Auth::id() ?: 0;

        $stat = $this->getUserStat($user_id);
        $notifications = $this->getNotification(5);

        $payment_history = $this->getPaymentHistory($user_id);
        $next_pay_date = $this->getNextPaymentDate($payment_history);
        $diamond_ends_at = $this->getDiamondEndsAt($user_id);
        return $this->render('mypage', compact('stat', 'notifications', 'next_pay_date', 'payment_history', 'diamond_ends_at'));
    }

    private function getDiamondEndsAt($user_id)
    {
        $subcription_model = new Subscription();
        $subscription = $subcription_model->lastest($user_id);
        if (!empty($subscription['ends_at'])) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $subscription['ends_at'])
                        //->addMonth()
                        ->format('Y年m月d日');
        }

        return '';
    }

    private function getUserStat(int $user_id)
    {
        $stat = $this->user_stat->getByUserId($user_id);

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
        $result = $this->notification->list($limit);
        foreach ($result as &$item) {
            $post_date = Carbon::createFromFormat('Y-m-d H:i:s', $item['post_date']);
            $item['post_date_short'] = $post_date->format('m/d');
            $item['post_date_long'] = $post_date->format('Y/m/d H:i');
        }

        return $result;
    }

    private function getNextPaymentDate(array $payment_history = [])
    {
        $result = array_shift($payment_history);

        if ($result) {
            return Carbon::createFromFormat('Y/m/d', $result['stripe_time'])
                        ->addMonth()
                        ->format('Y年m月d日');
        }
        return '';
    }

    private function getPaymentHistory(int $user_id)
    {
        $result = $this->user_payment_model->getHistory($user_id);
        foreach ($result as &$item) {
            $item['stripe_time'] = Carbon::createFromFormat('Y-m-d H:i:s', $item['stripe_time'])
                                    ->format('Y/m/d');
        }
        return $result;
    }
}
