<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

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

    public function get(array $filter = [])
    {
        $db = $this->where('role', USER_ROLE_PUBLIC)
                    ->orderBy('id', 'desc');

        if ($filter) {
            if (!empty($filter['fullname'])) {
                $db->where('name', 'like', '%' . $filter['fullname'] . '%');
            }
        }

        return $db->paginate(20);
    }

    public function statis()
    {
        $list = $this->select('id', 'mode', 'grade')
                    ->where('role', USER_ROLE_PUBLIC)
                    ->get()
                    ->toArray();

        $member_total = count($list);
        $member_normal = 0;
        $member_diamond = 0;

        foreach ($list as $item) {
            if ($item['grade'] == USER_GRADE_DIAMOND) {
                $member_diamond++;
                continue;
            }
            $member_normal++;
        }
        return compact('member_total', 'member_normal', 'member_diamond');
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

    public function updateAffiliatorUser(array $data)
    {
        $result = [
            'name' => $data['fullname'],
            'email' => $data['email'],
            'affiliator_id' => $data['affiliator_id'],
            'password' => Hash::make($data['password']),
            'mode' => MODE_ENABLE,
            'role' => USER_ROLE_CLIENT,
        ];

        return $this->where('id', $data['user_id'])->update($result);
    }

    public function deleteAffiliatorUser(int $affiliator_id)
    {
        $this->where('affiliator_id', $affiliator_id)->delete();
    }

    public function updateMode(int $user_id, int $mode)
    {
        $this->where('id', $user_id)
            ->update(['mode' => $mode]);
        return true;
    }
}
