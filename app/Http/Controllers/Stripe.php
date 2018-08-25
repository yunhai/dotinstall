<?php

namespace App\Http\Controllers;

use App\Http\Service\UtmTracking\UtmTrackingService;
use App\Models\Affiliator\Affiliator;
use App\Models\Affiliator\AffiliatorInvitation;
use App\Models\User\User as UserModel;
use App\Models\User\UserPayment as UserPaymentModel;

use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Illuminate\Http\Request;

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
//\Log::error(print_r($payload, true));
//		\Log::error(print_r($user, true));		
        $user_id = $user['id'];
        $affiliator_id = $user['affiliator_id'];

        if ($user_id) {
            $user_payment_model = new UserPaymentModel();
            $user_payment_model->savePayment($payload, $user_id);

            $user_grand = $succeeded ? USER_GRADE_DIAMOND : USER_GRADE_NORMAL;
            $user_model = new UserModel();
            $user_model->updateGrade($user_id, $user_grand);

            if ($succeeded) {
                $this->updateAffiliatorCommission($affiliator_id, $user_id);
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

    private function updateAffiliatorCommission($affiliator_id, $user_id)
    {
        $model = new AffiliatorInvitation();
        $model->updateCommission($affiliator_id, $user_id);
    }

    // public function handleWebhook(Request $request)
    // {
    //     $payload = [
    //         'data' => [
    //             'object' => [
    //                 'source' => [
    //                     'customer' => 'cus_DGnDf2r1MmpFd9',
    //                     'brand' => 'master card',
    //                     'last4' => '1234',
    //                 ],
    //                 'amount' => 1,
    //                 'created' => time(),
    //             ]
    //         ]
    //     ];
    //     $this->handleChargeWebhook($payload);
    // }
}
