<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
      'name', 'email', 'password', 'provider', 'provider_user_id'
    ];

    //hidden attributes
    protected $hidden = [
       'password', 'remember_token',
    ];

    public function updateInvitation(string $affiliator_token, int $participant_id)
    {
        $invitor = $this->getByAffiliatorToken($affiliator_token);

        if ($invitor) {
            $invitation = new Invitation();
            $invitation->flush($affiliator_token, $invitor->id, $participant_id);
        }

        return true;
    }

    private function getByAffiliatorToken($affiliator_token)
    {
        return $this
                ->where('affiliator_token', $affiliator_token)
                ->first();
    }
}
