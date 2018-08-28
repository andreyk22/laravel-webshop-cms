<?php

namespace App\Http\Middleware;
// use Illuminate\Foundation\Auth;
use App\User;
use Closure;
use Auth;
use Log;


class CheckStatus
{
        /**
          * Handle an incoming request.
          *
          * @param  \Illuminate\Http\Request  $request
          * @param  \Closure  $next
          * @param  string|null  $guard
          * @return mixed
          */
          public function handle($request, Closure $next)
          {
            if ( Auth::check() && Auth::user()->CheckStatus() )
            {
                return redirect('/shop/show/3');
                // return $next($request);
            }
        
            return redirect('/shop');
          }
  }
