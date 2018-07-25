<?php

namespace App\Models\User;

use App\Models\Base;
use Carbon\Carbon;

class UserUtm extends Base
{
    protected $fillable = [
      'user_id',
      'utm_source',
      'utm_code',
      'utm_date',
    ];

    public function saveUtm(array $data)
    {
        $data['utm_date'] = Carbon::now()->format('Y-m-d H:i:s');
        $this->create($data);
    }

    public function deleteUtm(int $user_id, int $utm_source)
    {
        return $this->where('user_id', $user_id)
                    ->where('utm_source', $utm_source)
                    ->delete();
    }

    public function getByUserId($user_id)
    {
        $target = $this->select('id', 'user_id', 'utm_source', 'utm_code', 'utm_date')
                        ->where('user_id', $user_id)
                        ->orderBy('utm_date', 'desc')
                        ->first();

        if ($target) {
            return $target->toArray();
        }

        return [];
    }
}
