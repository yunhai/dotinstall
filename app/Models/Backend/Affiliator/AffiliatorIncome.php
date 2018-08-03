<?php

namespace App\Models\Backend\Affiliator;

use App\Models\Backend\Base;
use App\Models\Backend\User;

class AffiliatorIncome extends Base
{
    public $fillable = [
        'affiliator_id',
        'target_date',
        'invitation',
        'commission',
    ];
}
