<?php

namespace App\Models;

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
}
