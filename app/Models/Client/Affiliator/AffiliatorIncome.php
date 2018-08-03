<?php

namespace App\Models\Client\Affiliator;

use App\Models\Client\Base;

class AffiliatorIncome extends Base
{
    public $fillable = [
        'affiliator_id',
        'target_date',
        'invitation',
        'commission',
    ];
}
