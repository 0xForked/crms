<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LocalApiAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! Auth::check()) {
            return  response()->json([
                'code' => Response::HTTP_UNAUTHORIZED,
                'status' => Response::$statusTexts[Response::HTTP_UNAUTHORIZED],
                'message' => "You doesn't have permission to access this path"
            ]);
        }

        return $next($request);
    }
}
