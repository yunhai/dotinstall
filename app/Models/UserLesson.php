<?php

namespace App\Models;

use Carbon\Carbon;

class UserLesson extends Base
{
    public $fillable = [
        'user_id',
        'lesson_id',
        'enroll_date',
        'finish_date',
        'mode',
    ];

    public function join($user_id, $lesson_id)
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
    
    public function joined()
    {
        return true;
    }
}
