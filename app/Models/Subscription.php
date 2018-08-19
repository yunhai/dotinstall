<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public $visible = [
        'id',
        'user_id',
        'name',
        'stripe_id',
        'stripe_plan',
        'quantity',
        'trial_ends_at',
        'ends_at'
    ];

    public function lastest(int $user_id)
    {
        $result = $this
                ->where('user_id', $user_id)
                ->orderBy('id', 'desc')
                ->first();

        if ($result) {
            return $result->toArray();
        }
        
        return [];
    }
}
