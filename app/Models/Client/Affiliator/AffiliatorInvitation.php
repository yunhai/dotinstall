<?php

namespace App\Models\Client\Affiliator;

use App\Models\Client\Base;
use App\Models\Client\User;

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
