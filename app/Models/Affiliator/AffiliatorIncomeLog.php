<?php

namespace App\Models\Affiliator;

use App\Models\Base;
use App\Models\Traits\UserSignature;

class AffiliatorIncomeLog extends Base
{
    use UserSignature;

    public $fillable = [
        'target_date',
        'affiliator_id',
        'user_id',
        'affiliator_commission_base',
        'affiliator_commission_rate',
        'affiliator_commission'
    ];
}
