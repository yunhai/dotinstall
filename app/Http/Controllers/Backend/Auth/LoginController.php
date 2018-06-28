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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web.backend')->except('logout');
    }
    
    public function getLogin() {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('backend.auth.login');
        }
    }
    
    public function postLogin(PostInput $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('status', 'メールアドレスかパスワードが間違っています');
        }
    }
    
    public function getLogout()
    {
        Auth::logout();
        return redirect('backend/login');
    }
    
    public function getChangePassword() {
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
