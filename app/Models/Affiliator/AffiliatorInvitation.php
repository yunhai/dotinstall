<?php

namespace App\Models\Affiliator;

use App\Models\Affiliator\Affiliator;
use App\Models\Affiliator\AffiliatorIncome;
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
        'affiliator_commission_base',
        'affiliator_commission_rate',
        'affiliator_commission',
        'join_date',
        'mode',
    ];

    public function init(array $data)
    {
        $affiliator_model = new Affiliator();

        $affiliator = $affiliator_model->getByToken($data['token']);
        if (!$affiliator) {
            return [];
        }

        $fee = MEMBERSHIP_FEE;
        $rate = $affiliator['commission_rate'];
        $commission = ($fee * $rate) / 100;
        $commission = intval(round($commission));

        $input = [
            'affiliator_id' => $affiliator['id'],
            'user_id' => $data['user_id'],
            'affiliator_token' => $data['token'],
            'affiliator_commission_base' => MEMBERSHIP_FEE,
            'affiliator_commission_rate' => $rate,
            'affiliator_commission' => $commission,
            'join_date' => Carbon::now(),
        ];

        $target = $this->create($input);

        $affiliator_model->updateCommissionBalance($affiliator['id'], $commission);

        $this->updateAffiliatorIncome($affiliator['id'], $input);

        return $target->toArray();
    }
    
    private function updateAffiliatorIncome(int $affiliator_id, array $data)
    {
        $income = [
            'affiliator_id' => $affiliator_id,
            'target_date' => $data['join_date']->format('Y-m-d'),
            'invitation' => 1,
            'commission' => $data['affiliator_commission']
        ];
        $affiliator_income_model = new AffiliatorIncome();
        $affiliator_income_model->updateIncome($affiliator_id, $income);
    }
}
