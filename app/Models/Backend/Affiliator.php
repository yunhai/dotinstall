<?php

namespace App\Models\Backend;

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
        'balance',
        'mode',
        'user_id',
    ];
}
