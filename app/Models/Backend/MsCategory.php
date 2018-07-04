<?php

namespace App\Models\Backend;

class MsCategory extends Base
{
    public $fillable = [
        'name',
        'sort',
    ];

    public function availableList()
    {
        return $this
            ->select('id', 'name')
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }
}
