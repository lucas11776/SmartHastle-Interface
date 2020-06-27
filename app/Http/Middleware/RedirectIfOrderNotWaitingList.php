<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfOrderNotWaitingList
{
    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $order = $request->route('order');

        if($order->status != 'waiting') {
            return redirect()
                ->back()
                ->with('warning', 'Unauthorized request please contact us for help.');
        }

        return $next($request);
    }
}
