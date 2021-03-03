<?php

namespace App\Http\Middleware;

use Closure;

class AdminVerify
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
            if($request->session()->get('usertype')=='admin' )
            {

                return $next($request);
            }
            else
            {

                $request->session()->flash('userPermissionError','Page Access Denied Reason: Not an Admin Account');
                return redirect()->route('dashboard');
            }
        }
        else
        {
            $request->session()->flash('errorMsg','Session Validation Error!');
            return redirect()->route('login');

        }
       
    }
}
