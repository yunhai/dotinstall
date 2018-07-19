<?php

namespace App\Models\Backend\Affiliator;

use App\Models\Backend\Base;

class AffiliatorInvitation extends Base
{
    public $fillable = [
        'affiliator_id',
        'user_id',
        'affiliator_token',
        'affiliator_commission',
        'join_date',
        'mode',
    ];
}
