<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $administrator = auth()->user()
            ->roles()
            ->where('name', 'administrator')
            ->first();

        if(is_null($administrator)) {
            return redirect()->back(401);
        }

        return $next($request);
    }
}
