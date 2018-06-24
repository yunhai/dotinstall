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

    public function create(array $input) {
        $key = Str::singular($this->getTable());
        return parent::create($input[$key]);
    }

    public function get(int $id)
    {
        return $this->findOrFail($id);
    }

    public function getListByIds(array $ids)
    {
        return $this->whereIn('id', $ids)->get();
    }
}
