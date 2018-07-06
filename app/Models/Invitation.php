<?php

namespace App\Models;

use Carbon\Carbon;

class Invitation extends Base
{
    public $fillable = [
        'invitor_id',
        'participant_id',
        'token',
        'effective_date',
    ];

    public function flush(string $token, int $invitor_id, int $participant_id)
    {
        $data = [
            'invitor_id' => $invitor_id,
            'participant_id' => $participant_id,
            'token' => $token,
            'effective_date' => Carbon::now()->format('Y-m-d H:i:s')
        ];
        
        $this->create($data);
        return true;
    }
}
