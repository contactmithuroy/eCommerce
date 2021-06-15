<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if($request->session()->has('ADMIN_LOGIN')){

        }else{ 
            Session::flash('error', 'Access Denied');
            return redirect('/login');
        }
        return $next($request);
    }
}
