<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class CheckPassword2nd
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
        if (Auth::guard('admin')->check()){

            if(Session::get('password2nd') !== null &&  Session::get('password2nd') == true){

                return $next($request);

            }else{

                Session::put('password2nd', false);

                return redirect()->route('admin.password2nd');
            }
        }else{

            return redirect()->route('admin.login');
        }
    }
}
