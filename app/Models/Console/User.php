<?php

namespace App\Models\Console;

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
}
