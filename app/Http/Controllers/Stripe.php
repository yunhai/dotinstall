<?php

namespace App\Http\Controllers;

use App\Http\Service\UtmTracking\UtmTrackingService;
use App\Models\User\User as UserModel;
use App\Models\User\UserPayment as UserPaymentModel;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class Stripe extends CashierController
{
    public function handleChargeSucceeded($payload)
    {
        $this->handleChargeWebhook($payload);
    }

    public function handleChargeFailed($payload)
    {
        $this->handleChargeWebhook($payload, false);
    }

    private function handleChargeWebhook($payload, $succeeded = true)
    {
        $user = $this->getUserByStripeId($payload['data']['object']['source']['customer']);
        $user_id = $user['id'];

        if ($user_id) {
            $user_payment_model = new UserPaymentModel();
            $user_payment_model->savePayment($payload, $user_id);

            $user_grand = $succeeded ? USER_GRADE_DIAMOND : USER_GRADE_NORMAL;
            $user_model = new UserModel();
            $user_model->updateGrade($user_id, $user_grand);

            if ($succeeded) {
                $this->utmWebHook($payload, $user_id);
            }
        }
    }

    private function utmWebHook($payload, $user_id)
    {
        $info = [
            'invoice' => $payload['data']['object']['invoice'],
            'currency' => $payload['data']['object']['currency']
        ];
        $service = new UtmTrackingService();
        $service->webhook($user_id, $info);
    }
}
