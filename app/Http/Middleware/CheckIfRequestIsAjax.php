<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfRequestIsAjax
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Request::ajax()) {
            return $next($request);
        }
        $request->session()->flush();
        return $next($request);
    }
}
