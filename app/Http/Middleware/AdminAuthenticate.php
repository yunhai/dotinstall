<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    public function handle($request, Closure $next)
    {
        $auth = Auth::guard('admin');
        if ($auth->check()) {
            return $next($request);
        } else {
            return redirect()->route('backend.login.login');
        }
    }
}
