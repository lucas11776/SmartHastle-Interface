<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfCartEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->cart()->count() == 0) {
            return redirect()
                ->back()
                ->with(['warning' => 'Please add some product to cart to checkout.']);
        }

        return $next($request);
    }
}
