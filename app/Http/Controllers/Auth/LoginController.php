<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web')->except('login');
    }

    public function postLogin(Request $request)
    {
        $input = $request->all();
 
        $credentials = [
            'email' => $input['email'],
            'password' => $input['password'],
            'role' => USER_ROLE_PUBLIC,
            'mode' => USER_MODE_ENABLE
        ];

        $remember = !empty($input['remember_me']);
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('top');
        }

        return redirect()->back()->with('error', 'メールアドレスかパスワードが間違っています。');
    }

    public function getLogout()
    {
        auth('web')->logout();
        return redirect()->route('top');
    }
}
