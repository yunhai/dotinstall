<?php

namespace App\Models\Backend;

class MsLanguage extends Base
{
    public $fillable = [
        'name',
        'fullname',
        'sort',
        'mode',
    ];

    public function availableList()
    {
        return $this
            ->select('id', 'name', 'fullname')
            ->where('mode', MODE_ENABLE)
            ->get()
            ->pluck('fullname', 'name')
            ->toArray();
    }

    public function allList()
    {
        return $this
            ->select('id', 'name', 'fullname')
            ->get()
            ->pluck('fullname', 'name')
            ->toArray();
    }
}
