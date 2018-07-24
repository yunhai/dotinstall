<?php

namespace App\Models\Client\Affiliator;

use App\Models\Client\Base;

class Affiliator extends Base
{
    public $fillable = [
        'fullname',
        'email',
        'token',
        'username',
        'password',
        'commission_rate',
        'balance',
        'mode',
        'user_id',
    ];

    public function getByUserId(int $user_id)
    {
        $target = $this->where('user_id', $user_id)->first();
        if ($target) {
            return $target->toArray();
        }
        return [];
    }
}
