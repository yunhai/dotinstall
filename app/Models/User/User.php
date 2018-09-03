<?php

namespace App\Models\User;

use App\Models\Traits\User\UserTrack;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, UserTrack, Billable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'provider',
        'provider_user_id',
        'affiliator_id',
        'grade',
        'diamond_ends_at',
    ];

    protected $hidden = [
       'password',
       'remember_token',
    ];

    public function updateGrade(int $user_id, int $grade)
    {
        $data = ['grade' => $grade];
        if ($grade == USER_GRADE_DIAMOND) {
            $data['diamond_ends_at'] = null;
        }

        $this->where('id', $user_id)
            ->update($data);
        return true;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function init(array $data)
    {
        if (empty($data['name'])) {
            $name = strstr($data['email'], '@', true);
        } else {
            $name = $data['name'];
        }

        $result = [
            'name' => $name,
            'email' => $data['email'],
            'role' => USER_ROLE_PUBLIC,
            'affiliator_id' => isset($data['affiliator_id']) ? $data['affiliator_id'] : 0,
            'provider' => isset($data['provider']) ? $data['provider'] : '',
            'provider_user_id' => isset($data['provider_user_id']) ? $data['provider_user_id'] : '',
        ];

        if (isset($data['grade'])) {
            $result['grade'] = $data['grade'];
        }

        if (!empty($data['password'])) {
            $result['password'] = Hash::make($data['password']);
        }

        $target = $this->create($result);

        $target->where('id', $target->id)
            ->update(['user_id' => $target->id]);

        return $target;
    }

    public function remove(int $id)
    {
        $this->findOrFail($id)->delete($id);
        return true;
    }

    public function updateDiamondEndAt(int $user_id, array $subscription)
    {
        $this->where('id', $user_id)
            ->update(['diamond_ends_at' => $subscription['ends_at']]);
        return true;
    }
}
