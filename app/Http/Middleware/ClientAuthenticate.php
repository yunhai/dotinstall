<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClientAuthenticate
{
    public function handle($request, Closure $next)
    {
        $auth = Auth::guard('client');
        if ($auth->check()) {
            return $next($request);
        } else {
            return redirect()->route('client.login.login');
        }
    }
}
