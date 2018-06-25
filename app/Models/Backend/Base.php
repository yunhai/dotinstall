<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Base extends Model
{
    use SoftDeletes;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function created_user()
    {
        return $this->belongsTo(User::class);
    }

    public function updated_user()
    {
        return $this->belongsTo(User::class);
    }

    public function get(int $id, $array_flag = true)
    {
        $result = $this->findOrFail($id);
        if ($array_flag) {
            return $result->toArray();
        }
        return $result;
    }

    public function edit(int $id, array $data = [])
    {
        $this->findOrFail($id);
        $this->where('id', $id)->update($data);
        return true;
    }

    public function getListByIds(array $ids)
    {
        return $this->whereIn('id', $ids)->get();
    }
}
