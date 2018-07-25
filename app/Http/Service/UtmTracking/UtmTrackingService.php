<?php

namespace App\Http\Service\UtmTracking;

use App\Models\User\User;
use App\Models\User\UserUtm as UserUtmModel;

class UtmTrackingService
{
    public function save(array $utm, int $user_id)
    {
        if (!empty($utm['utm_a8'])) {
            $this->saveA8($user_id, $utm['utm_a8']);
        }
    }

    private function saveA8($user_id, $code)
    {
        $model = new UserUtmModel();

        $data = [
            'user_id' => $user_id,
            'utm_source' => USER_UTM_A8,
            'utm_code' => $code,
        ];

        $model->deleteUtm($user_id, USER_UTM_A8);
        $model->saveUtm($data);
    }

    public function webhook(int $user_id, array $info)
    {
        $model = new UserUtmModel();
        $target = $model->getByUserId($user_id);

        if ($target) {
            switch ($target['utm_source']) {
                case USER_UTM_A8:
                    $this->triggerA8Webhook($target, $info);
                    break;
                default:
                    break;
            }
        }

        return true;
    }

    private function triggerA8Webhook(array $target, array $info)
    {
        $user_id = $target['user_id'];
        $unit_price = MEMBERSHIP_FEE;
        $quantity = 1;
        $total = MEMBERSHIP_FEE;
        $q = [
            'a8' => $target['utm_code'],
            'pid' => env('A8_PID'),
            'so' => 'user_id-' . $user_id,
            'si' => "{$unit_price}-{$quantity}-{$total}"
        ];
        $uri = 'https://px.a8.net/a8fly/earnings?' . http_build_query($q);
        $ch = curl_init($uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
    }
}
