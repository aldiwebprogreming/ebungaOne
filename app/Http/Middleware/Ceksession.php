<?php

namespace App\Http\Middleware;

use Closure;

class Ceksession
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

        if (session('email')) {
            return redirect('/seller');
        }else {
            return redirect('seller/login');
        }

        return $next($request);
    }
}
