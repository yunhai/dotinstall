<?php

namespace App\Models;

class Notification extends Base
{
    public $fillable = [
        'title',
        'content',
        'post_date'
    ];

    public function list($limit = 5)
    {
        $list = $this
                    ->select('id', 'title', 'content', 'post_date')
                    ->orderBy('post_date')
                    ->limit($limit)
                    ->get();
        if ($list) {
            return $list->toArray();
        }
        return [];
    }
}
