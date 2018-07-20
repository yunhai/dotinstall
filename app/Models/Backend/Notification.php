<?php

namespace App\Models\Backend;

use Carbon\Carbon;

class Notification extends Base
{
    public $fillable = [
        'title',
        'content',
        'post_date'
    ];

    public function create($input)
    {
        $input['post_date'] = Carbon::now()->format('Y-m-d h:i:s');
        return parent::create($input);
    }
}
