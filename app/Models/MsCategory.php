<?php

namespace App\Models;

class MsCategory extends Base
{
    public function getList()
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
}
