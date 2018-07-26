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

    public function getPendingList($limit = 50)
    {
        $list = $this->select('id', 'user_id', 'notification_id')
                    ->where('mode', MAIL_MODE_PENDING)
                    ->orderBy('id')
                    ->limit($limit)
                    ->get();
        if ($list) {
            return $list->toArray();
        }
        return [];
    }

    public function updadeSentModeByIdList(array $list = [])
    {
        $update = [
            'flush_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'mode' => MAIL_MODE_SENT,
        ];
        $this->whereIn('id', $list)
            ->update($update);
        return true;
    }
}
