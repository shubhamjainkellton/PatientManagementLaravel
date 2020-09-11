<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class DoctorMiddleware 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {   
    //     if(!session()->has('data')){

    //     return redirect('login');
    // }
    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {
        if(session('role_id') === 2){
            
            return $next($request); 
        }
        else{
            $request->session()->flush();
            return redirect('/login');
        }
       
    }
}
