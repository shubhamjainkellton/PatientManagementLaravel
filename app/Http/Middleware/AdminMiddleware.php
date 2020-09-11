<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Http\Request;


class AdminMiddleware 
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
        
        if(session('role_id')){
            
            return $next($request); 
        }
        else{
            $request->session()->flush();
            return redirect('/login');
        }

        
        
    }

    
}
