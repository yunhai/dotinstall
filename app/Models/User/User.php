<?php

namespace App\Models\User;

use App\Notifications\ResetPasswordNotification;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\Traits\User\UserTrack;

class User extends Authenticatable
{
    use Notifiable, UserTrack;

    protected $fillable = [
      'name', 'email', 'password', 'provider', 'provider_user_id'
    ];

    protected $hidden = [
       'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function init(array $data)
    {
        $result = [
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
