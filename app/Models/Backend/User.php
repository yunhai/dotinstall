<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'email',
        'affiliator_id',
        'password',
        'mode',
        'role',
    ];

    public function generateAffiliatorToken(int $id)
    {
        return str_random(8) . $id;
    }

    public function createAffiliatorUser(array $data)
    {
        $result = [
            'name' => $data['fullname'],
            'email' => $data['email'],
            'affiliator_id' => $data['affiliator_id'],
            'password' => Hash::make($data['password']),
            'mode' => MODE_ENABLE,
            'role' => USER_ROLE_CLIENT,
        ];

        $target = $this->create($result);
        return $target->toArray();
    }

    public function deleteAffiliatorUser(int $affiliator_id)
    {
        $this->where('affiliator_id', $affiliator_id)->delete();
    }
}
