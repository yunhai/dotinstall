<?php

namespace App\Models\Console;

use Carbon\Carbon;

class User extends Base
{
    public $fillable = [
        'name',
        'email',
    ];

    public function getByIdList($list = [])
    {
        $list = $this
                    ->select('id', 'name', 'email')
                    ->whereIn('id', $list)
                    ->get();
        if ($list) {
            return $list->toArray();
        }
        return [];
    }

    public function cleanDiamondByEndsAt()
    {
        $now = Carbon::now()->format('Y-m-d 0:00:00');
        $this->where('diamond_ends_at', '<', $now)
            ->where('grade', USER_GRADE_DIAMOND)
            ->update(['grade' => USER_GRADE_NORMAL, 'diamond_ends_at' => null]);
    }
}
