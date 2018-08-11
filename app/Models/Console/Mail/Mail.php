<?php

namespace App\Models\Console\Mail;

use App\Models\Console\Base;
use Carbon\Carbon;

class Mail extends Base
{
    public $fillable = [
        'user_id',
        'notification_id',
        'flush_date',
        'mode'
    ];

    public function getPendingList()
    {
        $list = $this->select('id', 'user_id', 'notification_id')
                    ->where('mode', MAIL_MODE_PENDING)
                    ->orderBy('id')
                    ->get();
        if ($list) {
            return $list->toArray();
        }
        return [];
    }

    public function updadeSentModeByUserIdNotificationId(int $user_id, int $notification_id)
    {
        $update = [
            'flush_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'mode' => MAIL_MODE_SENT,
        ];
        $this->where('user_id', $user_id)
            ->where('notification_id', $notification_id)
            ->update($update);
        return true;
    }
}
