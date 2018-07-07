<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\UserSignature;

class Base extends Model
{
    use UserSignature, SoftDeletes;

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
        $this
           ->findOrFail($id)
           ->update($data);
        return true;
    }

    public function remove(int $id)
    {
        $this->findOrFail($id)->delete($id);
        return true;
    }

    public function getListByIds(array $ids)
    {
        return $this->whereIn('id', $ids)->get();
    }
}
