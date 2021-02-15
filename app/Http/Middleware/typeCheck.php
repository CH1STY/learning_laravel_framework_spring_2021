<?php

namespace App\Http\Middleware;

use Closure;

class typecheck
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
        if($request->session()->get('username')!='admin')
        {
            return redirect('/home');
        }
        else
        {
            return $next($request);
        }
    }
}
