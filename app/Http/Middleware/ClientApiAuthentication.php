<?php

namespace App\Http\Middleware;

use Closure;

class ClientApiAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // todo on this middleware we will authenticate the client for security purpose

        return $next($request);
    }
}
