<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('username'))
        {
           return redirect('login')->with('fail', 'You have to Logged in first!!!');
        }
        if($request->session()->get('username') == "admin")
        {
        return $next($request);
        }else
        {            
            return back();
        //    return redirect('login')->with('fail', 'You have to Logged in first!!!');
        }
    }
}
