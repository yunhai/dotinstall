<?php

namespace App\Models\Backend\Affiliator;

use App\Models\Backend\Base;
use App\Models\Backend\User;

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

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
