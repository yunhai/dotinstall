<?php

namespace App\Models\User;

use App\Models\Base;
use Carbon\Carbon;

class UserLearningLog extends Base
{
    public $fillable = [
        'user_id',
        'lesson_detail_id',
        'learning_date',
        'learning_time',
        'learning_duration',
    ];

    public function saveLog($input)
    {
        $input['now'] = Carbon::now();
        $this->makeSaveLog($input);
        $this->updateUserStat($input);
    }

    private function updateUserStat($input)
    {
        $date = $input['now']->format('Y-m-d');
        $flag = $this->checkExistByDate($date);

        $data = [
            'duration' => $input['duration'],
            'user_id' => $input['user_id'],
        ];

        $model = new UserStat();
        $model->saveStat($data, !$flag);
    }

    private function checkExistByDate(string $date)
    {
        return $this->where('learning_date', $date)->exists();
    }

    private function makeSaveLog($input)
    {
        $basic = [
            'learning_duration' => $input['duration'],
            'learning_date' => $input['now']->format('Y-m-d'),
            'learning_time' => $input['now']->format('H:i:s')
        ];
        $input = array_merge($input, $basic);
        $this->create($input);
        return true;
    }
}
