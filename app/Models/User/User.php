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
      'name', 'email', 'password', 'provider', 'provider_user_id', 'grade'
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
            $this->updateGrand($user_id, USER_GRADE_DIAMOND);
            return true;
        } catch (\Stripe\Error\Card $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $code = $err['code'];
            $map = [
                'card_declined' => 'Your card has insufficient funds.',
                'incorrect_cvc' => 'Your card\'s security code is incorrect.',
                'processing_error' => 'An error occurred while processing your card. Try again in a little bit.',
                'expired_card' => 'Your card has expired.',
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

    public function updateGrand(int $user_id, int $grade)
    {
        $this->where('id', $user_id)
            ->update(['grade' => $grade]);
        return true;
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
