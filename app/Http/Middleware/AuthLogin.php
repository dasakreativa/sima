<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthLogin
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
      if(auth()->guard('admin')->user() OR auth()->guard('user')->user())
      {
        return $next($request);
      } else {
        return redirect()->route('login.main')->with('error', 'You are not logged in!');
      }
    }
}
