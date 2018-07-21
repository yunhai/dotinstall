<?php

namespace App\Models\Affiliator;

use App\Models\Affiliator\Affiliator;
use App\Models\Base;
use App\Models\Traits\Affiliator\UserTrack;
use Carbon\Carbon;

class AffiliatorInvitation extends Base
{
    use UserTrack;

    public $fillable = [
        'affiliator_id',
        'user_id',
        'affiliator_token',
        'affiliator_commission',
        'join_date',
        'mode',
    ];

    public function init(array $data)
    {
        $affiliator_model = new Affiliator();

        $affiliator = $affiliator_model->getByToken($data['token']);

        $fee = MEMBERSHIP_FEE;
        $rate = $affiliator['commission_rate'];
        $commission = ($fee * $rate) / 100;
        $commission = intval(round($commission));

        $input = [
            'affiliator_id' => $affiliator['id'],
            'user_id' => $data['user_id'],
            'affiliator_token' => $data['token'],
            'affiliator_commission' => $commission,
            'join_date' => Carbon::now(),
        ];

        $target = $this->create($input);

        $affiliator_model->updateCommissionBalance($affiliator['id'], $commission);

        return $target->toArray();
    }
}
