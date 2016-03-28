<?php

namespace App\Http\Middleware;

use Closure;

class RentalAclMiddleware
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
        $adminRole  = auth()->user()->is('admin');
        $vzwRole    = auth()->user()->is('vzw');
        $devRole    = auth()->user()->is('developer');
        $rentalRole = auth()->user()->is('verhuur');

        if ($rentalRole || $adminRole || $vzwRole || $devRole) {
            return $next($request);
        }

        return redirect()->back(302);
    }
}
