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

        $input = [
            'affiliator_id' => $affiliator['id'],
            'user_id' => $data['user_id'],
            'affiliator_token' => $data['token'],
            'join_date' => Carbon::now(),
        ];
        
        if ($data['grade'] === USER_GRADE_PENDING_DIAMOND) {
            $fee = MEMBERSHIP_FEE;
            $rate = $affiliator['commission_rate'];
            $commission = ($fee * $rate) / 100;
            $commission = intval(round($commission));

            $append = [
                'affiliator_commission_base' => MEMBERSHIP_FEE,
                'affiliator_commission_rate' => $rate,
                'affiliator_commission' => $commission,
                'mode' => MODE_DISABLE,
            ];

            $input = array_merge($input, $append);
        }

        $target = $this->create($input);

        return $target->toArray();
    }

    public function getByAffiliatorIdAndUserId($affiliator_id, $user_id)
    {
        $result = $this->select(
                'id',
                'join_date',
                'affiliator_id',
                'user_id',
                'affiliator_commission_base',
                'affiliator_commission_rate',
                'affiliator_commission'
            )
            ->where('affiliator_id', $affiliator_id)
            ->where('user_id', $user_id)
            ->first();
        if ($result) {
            return $result->toArray();
        }

        return [];
    }
    
    public function enableAffiliatorInvitation($id)
    {
        $this
            ->where('id', $id)
            ->update(['mode' => MODE_ENABLE]);
        return true;
    }
    
    public function updateCommission($affiliator_id, $user_id)
    {
        $record = $this->getByAffiliatorIdAndUserId($affiliator_id, $user_id);
        if (!$record) {
            return false;
        }
        
        $this->enableAffiliatorInvitation($record['id']);

        $this->saveAffiliatorIncomeLog($record);
        $commission = $record['affiliator_commission'];

        $affiliator_model = new Affiliator();
        $affiliator_model->updateCommissionBalance($affiliator_id, $commission);

        $this->updateAffiliatorIncome($affiliator_id, $record);

        return true;
    }

    private function saveAffiliatorIncomeLog($data)
    {
        $save = [
            'target_date' => Carbon::now(),
            'affiliator_id' => $data['affiliator_id'],
            'user_id' => $data['user_id'],
            'affiliator_commission_base' => $data['affiliator_commission_base'],
            'affiliator_commission_rate' => $data['affiliator_commission_rate'],
            'affiliator_commission' => $data['affiliator_commission'],
        ];
        
        $model = new AffiliatorIncomeLog();
        $target = $model->create($save);
        return $target->toArray();
    }
    
    private function updateAffiliatorIncome(int $affiliator_id, array $data)
    {
        $income = [
            'affiliator_id' => $affiliator_id,
            'target_date' => Carbon::now()->format('Y-m-d'),
            'invitation' => 1,
            'commission' => $data['affiliator_commission']
        ];

        $affiliator_income_model = new AffiliatorIncome();
        $affiliator_income_model->updateIncome($affiliator_id, $income);
    }
}
