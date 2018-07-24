<?php

namespace App\Http\Service\Payment;

use App\Models\User\User;

class Stripe
{
    public function charge(int $user_id, string $token, array &$error = [])
    {
        $user = User::find($user_id);

        try {
            $user->newSubscription('main', env('STRIPE_SUPSCRIPTION_ID'))->create($token);

            return true;
        } catch (\Stripe\Error\Card $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $code = $err['code'];
            $map = [
                'card_declined' => '残金が足りません',
                'incorrect_cvc' => 'CVCが間違っています',
                'processing_error' => '不具合が発生しました。もう一度試していただけませんか？',
                'expired_card' => 'カードは期限を超えています',
            ];

            array_push($error, $map[$code]);
        } catch (\Stripe\Error\RateLimit $e) {
            abort(500, 'Too many requests made to the API too quickly');
        } catch (\Stripe\Error\InvalidRequest $e) {
            abort(500, "Invalid parameters were supplied to Stripe\'s API");
        } catch (\Stripe\Error\Authentication $e) {
            abort(500, "Authentication with Stripe's API failed (maybe you changed API keys recently)");
        } catch (\Stripe\Error\ApiConnection $e) {
            abort(500, 'Network communication with Stripe failed');
        } catch (\Stripe\Error\Base $e) {
            abort(500, 'Stripe generic error');
        } catch (Exception $e) {
            abort(500);
        }

        return false;
    }

    public function cancel(int $user_id)
    {
        $user = User::find($user_id);
        if (!$user->subscription('main')->cancelled()) {
            $user->subscription('main')->cancel();
        }
        return true;
    }
}
