<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    protected function credentials(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => USER_ROLE_PUBLIC,
            'mode' => USER_MODE_ENABLE,
            'deleted_at' => NULL
        ];
        return array_merge($credentials);
    }

    public function getLogout()
    {
        auth('web')->logout();
        return redirect('');
    }
}
