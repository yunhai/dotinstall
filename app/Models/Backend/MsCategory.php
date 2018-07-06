<?php

namespace App\Models\Backend;

class MsCategory extends Base
{
    public $fillable = [
        'name',
        'sort',
        'mode',
    ];

    public function availableList()
    {
        return $this
            ->select('id', 'name')
            ->where('mode', MODE_ENABLE)
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }

    public function allList()
    {
        return $this
            ->select('id', 'name')
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }
}
