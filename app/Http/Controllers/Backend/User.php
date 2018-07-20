<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\User as UserModel;

class User extends Base
{
    public function __construct(
        UserModel $user_model
    ) {
        $this->model = $user_model;
    }

    public function getIndex()
    {
        $users = $this->model->orderBy('id', 'desc')->paginate(20);
        return $this->render('user.index', compact('users'));
    }
}
