<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\PostChangePassword;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function getChangePassword()
    {
        return view('backend.auth.change_password');
    }

    public function postChangePassword(PostChangePassword $request)
    {
        $user = Auth::guard('admin')->user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with('success', '保存しました');
    }
}
