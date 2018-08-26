<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Client\Auth\PostLogin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function getLogin()
    {
        $auth = Auth::guard('client');
        if ($auth->check()) {
            return redirect()->route('client.home.dashboard');
        }
        return view('client.auth.login');
    }

    public function postLogin(PostLogin $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => USER_ROLE_CLIENT,
            'mode' => USER_MODE_ENABLE,
        ];

        if (Auth::guard('client')->attempt($credentials)) {
            return redirect()->route('client.home.dashboard');
        }

        return redirect()->back()->with('status', '');
    }

    public function getLogout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('client.login.login');
    }
}
