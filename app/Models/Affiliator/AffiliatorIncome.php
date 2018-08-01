<?php

namespace App\Models\Affiliator;

use App\Models\Affiliator\Affiliator;
use App\Models\Base;
use App\Models\Traits\UserSignature;
use Carbon\Carbon;

class AffiliatorIncome extends Base
{
    use UserSignature;

    public $fillable = [
        'affiliator_id',
        'target_date',
        'invitation',
        'commission',
    ];

    public function updateIncome(int $affiliate_id, array $data)
    {
        $affiliator_id = $data['affiliator_id'];
        $target_date = $data['target_date'];
        $existed = $this->checkIncomeDateExisted($affiliator_id, $target_date);
        
        if ($existed) {
            $query = $this->where('affiliator_id', $affiliator_id)
                        ->where('target_date', $target_date);
            $query->increment('invitation', $data['invitation']);
            $query->increment('commission', $data['commission']);
        } else {
            $this->create($data);
        }
        return true;
    }
    
    private function checkIncomeDateExisted(int $affiliator_id, string $target_date)
    {
        return $this->where('affiliator_id', $affiliator_id)
                    ->where('target_date', $target_date)
                    ->exists();
    }
}
