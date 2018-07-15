<?php

namespace App\Models\User;

use App\Models\Base;
use Carbon\Carbon;

class UserLessonDetail extends Base
{
    public $fillable = [
        'user_id',
        'lesson_detail_id',
        'view_date',
        'close_date',
        'mode',
    ];

    public function learn(int $user_id, int $lesson_id, int $lesson_detail_id)
    {
        $data = [
            'user_id' => $user_id,
            'lesson_detail_id' => $lesson_detail_id,
            'view_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'mode' => USER_LESSON_DETAIL_MODE_LEARN
        ];
        $this->create($data);
        return true;
    }
    
    public function learned(int $user_id, int $lesson_id, int $lesson_detail_id)
    {
        return $this->where('user_id', $user_id)
                    ->where('lesson_detail_id', $lesson_detail_id)
                    ->exists();
    }

    public function close(int $user_id, int $lesson_id, int $lesson_detail_id)
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        if ($this->learned($user_id, $lesson_id, $lesson_detail_id)) {
            $data = [
                'close_date' => $now,
                'mode' => USER_LESSON_DETAIL_MODE_CLOSE
            ];
            $this
                ->where('user_id', $user_id)
                ->where('lesson_detail_id', $lesson_detail_id)
                ->update($data);
            return true;
        }

        $data = [
            'user_id' => $user_id,
            'lesson_detail_id' => $lesson_detail_id,
            'close_date' => $now,
            'view_date' => $now,
            'mode' => USER_LESSON_DETAIL_MODE_CLOSE
        ];
        $this->create($data);
        return true;
    }
    
    public function closed(int $user_id, int $lesson_id, int $lesson_detail_id)
    {
        return $this->where('user_id', $user_id)
            ->where('lesson_detail_id', $lesson_detail_id)
            ->where('mode', USER_LESSON_DETAIL_MODE_CLOSE)
            ->exists();
    }
}
