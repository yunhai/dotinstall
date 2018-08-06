<?php

namespace App\Models\User;

use App\Models\Base;

class UserStat extends Base
{
    public $fillable = [
        'user_id',
        'closed_lesson_detail_count',
        'learning_date_count',
        'learning_duration',
    ];

    public function getByUserId(int $user_id)
    {
        $target = $this
                    ->select('id', 'user_id', 'learning_date_count', 'learning_duration', 'closed_lesson_detail_count')
                    ->where('user_id', $user_id)
                    ->first();
        if ($target) {
            return $target->toArray();
        }
        return [];
    }

    public function saveStat($data, $date_count_flag)
    {
        extract($data);
        $target = $this->getByUserId($user_id);
        if ($target) {
            $this->where('id', $target['id'])
                ->increment('learning_duration', $data['duration']);

            if ($date_count_flag) {
                $this->where('id', $target['id'])
                    ->increment('learning_date_count', 1);
            }
        } else {
            $input = [
                'user_id' => $user_id,
                'learning_date_count' => 1,
                'learning_duration' => $data['duration'],
            ];
            $this->create($input);
        }
    }

    public function updateClosedCount(int $user_id, $positive = true)
    {
        if ($positive) {
            $this->where('user_id', $user_id)
                ->increment('closed_lesson_detail_count', 1);
            return true;
        }
        $this->where('user_id', $user_id)
            ->decrement('closed_lesson_detail_count', 1);
        return true;
    }
}
