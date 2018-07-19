<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Backend\Admin\PostInput;
use App\Models\Backend\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\checkCurrentPasswordRule;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'admin';

    public function __construct()
    {
        $this->middleware('web.backend')->except('logout');
        $this->role = USER_ROLE_BACKEND;
    }

    public function getLogin()
    {
        if (isset(Auth::user()->role) && Auth::user()->role === $this->role) {
            return redirect()->route('backend.home.dashboard');
        }
        return view('backend.auth.login');
    }

    public function postLogin(PostInput $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => $this->role,
            'mode' => USER_MODE_ENABLE,
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('backend.home.dashboard');
        }
        return redirect()->back()->with('status', 'メールアドレスかパスワードが間違っています');
    }

    public function getLogout()
    {
        auth('admin')->logout();
        return redirect()->route('backend.login.login');
    }

    public function getChangePassword()
    {
        return view('backend.auth.changepassword');
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

        return redirect()->back()->with('success', '保存しました');
    }
}
