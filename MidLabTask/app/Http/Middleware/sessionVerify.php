<?php

namespace App\Http\Middleware;

use Closure;

class sessionVerify
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
            $request->session()->flash('errorMsg','Session Validation Error!');
            return redirect()->route('login');

        }
    }
}
