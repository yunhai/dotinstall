<?php

namespace App\Models\User;

use App\Models\Base;

class UserPayment extends Base
{
    protected $fillable = [
      'user_id',
      'stripe_id',
      'stripe_amount',
      'stripe_status',
      'stripe_time',
      'card_brand',
      'card_last_four'
    ];

    public function savePayment($payload, $user_id, $succeeded = true)
    {
        $data = [
            'user_id' => $user_id,
            'stripe_id' => $payload['data']['object']['source']['customer'],
            'stripe_amount' => $payload['data']['object']['amount'],
            'stripe_status' => $succeeded ? USER_PAYMENT_CHARGE_SUCCEEDED : USER_PAYMENT_CHARGE_FAILED,
            'stripe_time' => gmdate('Y-m-d H:i:s', $payload['data']['object']['created']),
            'card_brand' => $payload['data']['object']['source']['brand'],
            'card_last_four' => $payload['data']['object']['source']['last4'],
        ];
        $this->create($data);
    }
}
