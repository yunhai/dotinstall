<?php

namespace App\Models\Backend;

use App\Models\Backend\Base;

class Affiliator extends Base
{
    public $fillable = [
        'fullname',
        'email',
        'token',
        'username',
        'password',
        'balance',
        'mode'
    ];
}
