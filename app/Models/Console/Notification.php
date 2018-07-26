<?php

namespace App\Models\Console;

class Notification extends Base
{
    public $fillable = [
        'title',
        'content',
        'post_date'
    ];

    public function getByIdList($list = [])
    {
        $list = $this
                    ->select('id', 'title', 'content', 'post_date')
                    ->whereIn('id', $list)
                    ->orderBy('post_date')
                    ->get();
        if ($list) {
            return $list->toArray();
        }
        return [];
    }
}
