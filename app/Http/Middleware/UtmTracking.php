<?php

namespace App\Http\Middleware;

use Closure;

class UtmTracking
{
    public function handle($request, Closure $next)
    {
        $a8 = $request->input('a8');
        if ($a8 || $request->hasCookie('utm_a8')) {
            if ($a8) {
                $request->attributes->add(['utm' => ['utm_a8' => $attr]]);
            } else {
                $request->attributes->add(['utm' => ['utm_a8' => $request->cookie('utm_a8')]]);
            }
        }

        if ($a8) {
            $response = $next($request);
            return $response->withCookie(cookie()->forever('utm_a8', $a8));
        }

        return $next($request);
    }
}
