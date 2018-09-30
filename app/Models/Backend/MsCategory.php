<?php

namespace App\Models\Backend;

class MsCategory extends Base
{
    public $fillable = [
        'name',
        'caption',
        'media_id',
        'level',
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

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function getWithRelation($id)
    {
        $relations = [
            'media',
        ];

        return $this
                ->with($relations)
                ->findOrFail($id);
    }
}
