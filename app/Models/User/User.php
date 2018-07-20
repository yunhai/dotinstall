<?php

namespace App\Models\User;

use App\Notifications\ResetPasswordNotification;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\Traits\User\UserTrack;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, UserTrack, Billable;

    // protected $fillable = [
    //   'name', 'email', 'password', 'provider', 'provider_user_id'
    // ];

    protected $hidden = [
       'password', 'remember_token',
    ];

    public function charge($token)
    {
        $user = User::find(58);
        // dd($user->subscription('monthly'));env('STRIPE_KEY'),

        $user->newSubscription('main', env('STRIPE_SUPSCRIPTION_ID'))->create($token);
    }

    public function upgrade()
    {
        $user = User::find(58);
        // dd($user->subscription('monthly'));
        $user->subscription('main')->swap('yearly');
    }

    public function coupon($token)
    {
        $user = User::find(58);
        // dd($user);
        // dd(Auth::user());
        $user->newSubscription('main', 'monthly')
             ->withCoupon('social_share_coupon')
             ->create($token);
    }

    public function cancel()
    {
        $user = User::find(100);
        $user->subscription('main')->cancel();
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function init(array $data)
    {
        $result = [
            //'name' => $data['name'],
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
