<?php

namespace App\Models\User;

use App\Models\Base;
use App\Models\Lesson\Lesson;
use App\Models\User\UserLearningLog;
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

    public function lessons()
    {
        return $this->belongsTo(Lesson::class)
                    ->enable();
    }

    public function getByLessonId(int $user_id, array $lesson_id)
    {
        $fields = [
          'lesson_details.lesson_id',
          'user_lesson_details.lesson_detail_id',
          'user_lesson_details.mode',
        ];

        return $this->select($fields)
                    ->join('lesson_details', 'lesson_detail_id', '=', 'lesson_details.id')
                    ->where('user_id', $user_id)
                    ->get()
                    ->toArray();
    }

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
        $flag = $this->makeClose($user_id, $lesson_id, $lesson_detail_id);

        if ($flag) {
            $user_stat_model = new UserStat();
            $user_stat_model->updateClosedCount($user_id);
        }

        return $flag;
    }

    private function makeClose(int $user_id, int $lesson_id, int $lesson_detail_id)
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

    public function reopen(int $user_id, int $lesson_id, int $lesson_detail_id)
    {
        $flag = $this->makeReopen($user_id, $lesson_id, $lesson_detail_id);

        if ($flag) {
            $user_stat_model = new UserStat();
            $user_stat_model->updateClosedCount($user_id, false);
        }

        return $flag;
    }

    private function makeReopen(int $user_id, int $lesson_id, int $lesson_detail_id)
    {
        if ($this->closed($user_id, $lesson_id, $lesson_detail_id)) {
            $data = [
                'close_date' => null,
                'mode' => USER_LESSON_DETAIL_MODE_LEARN
            ];
            $this
                ->where('user_id', $user_id)
                ->where('lesson_detail_id', $lesson_detail_id)
                ->update($data);

            return true;
        }

        return true;
    }
}
