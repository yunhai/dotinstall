<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Support\Facades\View;
use Auth;

class WebGlobalVariable
{
    public function handle($request, Closure $next)
    {
        $setting_model = new Setting();
        View::share('global_setting', $setting_model->getAll());
        View::share('name', $this->userName());

        return $next($request);
    }

    public function userName()
    {
        if (Auth::check()) {
            return strstr(Auth::user()->name, '@', true) == true ? strstr(Auth::user()->name, '@', true) : Auth::user()->name;
        }
    }
}
