<?php

namespace App\Models;

class Announcement extends Base
{
    public $fillable = [
        'title',
        'content',
        'post_date'
    ];

    public function list(int $limit = 4)
    {
        $list = $this
                    ->select('id', 'title', 'content', 'post_date')
                    ->orderBy('post_date', 'desc')
                    ->limit($limit)
                    ->get();
        if ($list) {
            return $list->toArray();
        }
        return [];
    }
}
