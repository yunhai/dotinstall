<?php

namespace App\Models\User;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\Traits\User\UserTrack;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, UserTrack, Billable;

    protected $fillable = [
      'name', 'email', 'password', 'provider', 'provider_user_id'
    ];

    protected $hidden = [
       'password', 'remember_token',
    ];

    public function charge(int $user_id, string $token, array &$error = [])
    {
        $user = User::find($user_id);
        if (!$user) {
            throw(404);
        }
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

    public function upgrade(int $user_id)
    {
        $user = User::find($user_id);
        $user->subscription('main')->swap('yearly');
    }

    public function coupon(int $user_id, string $token)
    {
        $user = User::find($user_id);

        $user->newSubscription('main', 'monthly')
             ->withCoupon('social_share_coupon')
             ->create($token);
    }

    public function cancel(int $user_id)
    {
        $user = User::find($user_id);
        $user->subscription('main')->cancel();
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function init(array $data)
    {
        $result = [
            'name' => empty($data['name']) ? $data['email'] : $data['name'],
            'email' => $data['email'],
            'role' => USER_ROLE_PUBLIC,
            'provider' => isset($data['provider']) ? $data['provider'] : '',
            'provider_user_id' => isset($data['provider_user_id']) ? $data['provider_user_id'] : '',
        ];

        if (!empty($data['password'])) {
            $result['password'] = Hash::make($data['password']);
        }

        $target = $this->create($result);

        $target->where('id', $target->id)
            ->update(['user_id' => $target->id]);

        return $target;
    }
}
