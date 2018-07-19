<?php

namespace App\Models\Backend\Affiliator;

use App\Models\Backend\Base;

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
}
