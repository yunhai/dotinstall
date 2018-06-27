<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    public $fillable = [
        'email',
        'password',
    ];
}
