<?php

namespace App\Models\User;

use App\Models\Base;
use Carbon\Carbon;
use DB;

class UserLesson extends Base
{
    public $fillable = [
        'user_id',
        'lesson_id',
        'enroll_date',
        'close_date',
        'mode',
    ];

    public function enroll(int $user_id, int $lesson_id)
    {
        $data = [
            'user_id' => $user_id,
            'lesson_id' => $lesson_id,
            'enroll_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'mode' => USER_LESSON_MODE_ENROLL
        ];
        $this->create($data);
        return true;
    }

    public function enrolled(int $user_id, int $lesson_id)
    {
        return $this->where('user_id', $user_id)
            ->where('lesson_id', $lesson_id)
            ->exists();
    }

    public function close(int $user_id, int $lesson_id)
    {
        $data = [
            'close_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'mode' => USER_LESSON_MODE_CLOSE
        ];

        $this
            ->where('user_id', $user_id)
            ->where('lesson_id', $lesson_id)
            ->update($data);

        return true;
    }

    public function closed(int $user_id, int $lesson_id)
    {
        return $this->where('user_id', $user_id)
                    ->where('lesson_id', $lesson_id)
                    ->where('mode', USER_LESSON_MODE_CLOSE)
                    ->exists();
    }

    public function getStat(array $lesson_id)
    {
        return $this->select('lesson_id', DB::raw('count(*) as count'))
                 ->whereIn('lesson_id', $lesson_id)
                 ->groupBy('lesson_id')
                 ->get()
                 ->pluck('count', 'lesson_id')
                 ->toArray();
    }
}
