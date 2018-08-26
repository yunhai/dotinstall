<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Backend\Auth\PostLogin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function getLogin()
    {
        $auth = Auth::guard('admin');
        if ($auth->check()) {
            return redirect()->route('backend.home.dashboard');
        }
        return view('backend.auth.login');
    }

    public function postLogin(PostLogin $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => USER_ROLE_ADMIN,
            'mode' => USER_MODE_ENABLE,
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('backend.home.dashboard');
        }

        return redirect()->back()->with('status', '');
    }

    public function getLogout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect()->route('backend.login.login');
        }
    }
}
