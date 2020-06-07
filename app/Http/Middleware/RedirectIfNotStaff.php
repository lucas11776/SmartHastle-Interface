<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotStaff
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
        $staff = auth()->user()
            ->roles()
            ->where('name', 'administrator')
            ->orWhere('name', 'staff')
            ->first();

        if(is_null($staff)) {
            return redirect()->back(401);
        }

        return $next($request);
    }
}
