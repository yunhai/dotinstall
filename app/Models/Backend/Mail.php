<?php

namespace App\Models\Backend;
use App\Models\Backend\User;

class Mail extends Base
{
    public $fillable = [
        'user_id',
        'notification_id',
    ];

    public function init($notification_id)
    {
        $user_model = new User();

        $user = $user_model->select('id')
            ->where('role', USER_ROLE_PUBLIC)
            ->where('mode', MODE_ENABLE)
            ->where('deleted_at', null)
            ->get();

        if (empty($user)) {
            return [];
        }

        foreach ($user as $key => $value) {
            $this->create(['user_id' => $value->id, 'notification_id' => $notification_id]);
        }

        return true;
    }
}
