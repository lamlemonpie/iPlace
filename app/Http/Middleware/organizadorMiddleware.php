<?php

namespace iPlace\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class organizadorMiddleware
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
      if($request->session()){
        
        if (!Auth::user()->organizador) {
            return redirect('/home');
        }

      }
      else {
        return redirect('/home');
      }



        return $next($request);
    }
}
