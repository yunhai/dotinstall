<?php

namespace App\Models;

class Media extends Base
{
    public $visible = [
        'id',
        'path',
        'original_name',
        'mime',
        'type',
    ];

    public function retrieve(array $id)
    {
        return $this->select('id', 'path', 'original_name')
                    ->whereIn('id', $id)
                    ->get()
                    ->toArray();
    }
}
