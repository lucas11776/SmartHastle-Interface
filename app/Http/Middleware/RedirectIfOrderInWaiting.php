<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfOrderInWaiting
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
        $hasOrderInWaitingList = auth()->user()
            ->orders()
            ->where('status', 'waiting')
            ->count() > 0;

        if($hasOrderInWaitingList) {
            return redirect()
                ->back()
                ->with('info', 'You can not create new order when the is a order in waiting list.');
        }

        return $next($request);
    }
}
