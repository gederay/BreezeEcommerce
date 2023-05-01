<?php

namespace App\Http\Middleware;

use Closure;
// use App\Http\Middleware\EnsureEmailIsVerified;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

class GuestOrVerified extends EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $redirectToRoute = null): Response
    {
        if (!$request->user()) {
            return $next($request);
        };

        return parent::handle($request, $next, $redirectToRoute);
    }
}
