<?php

namespace App\Http\Middleware;

use Closure;

class SessionVerify
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
        if($request->session()->has('username'))
        {
            return $next($request);

        }
        else
        {
            $request->session()->flash('msg','invalid request login first');
            return redirect('/login');
        }
    }
}
