<?php

namespace App\Models\Backend\Affiliator;

use App\Models\Backend\Base;
use App\Models\Backend\Traits\Affiliator\AffiliatorUser;

class Affiliator extends Base
{
    use AffiliatorUser;

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
