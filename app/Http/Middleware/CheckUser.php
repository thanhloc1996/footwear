<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Cart;

class CheckUser
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
        // dd('dasdasd');
        if (Auth::check()){

            return $next($request);

        }else{
            // Cart::destroy();
            return redirect()->route('frontend.login');
        }
    }
}
