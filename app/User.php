<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $fillable = [
      'name', 'email', 'password',
    ];
    
    //hidden attributes
    protected $hidden = [
       'password', 'remember_token',
    ];
}
