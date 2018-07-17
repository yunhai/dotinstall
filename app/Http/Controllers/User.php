<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\User as UserModel;
use Auth;
use App\Rules\checkCurrentPasswordRule;

class User extends Base
{
    public function __construct(
        UserModel $user_model
    ) {
        $this->model = $user_model;
    }

    public function getChangePassword()
    {
        return view('user.change_password');
    }

    public function postChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                new checkCurrentPasswordRule()
            ],
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with('success', '更新しました');
    }
}
