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
            ->orderBy('sort')
            ->orderBy('id')
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }

    public function allList()
    {
        return $this
            ->select('id', 'name')
            ->orderBy('sort')
            ->orderBy('id')
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }
}
