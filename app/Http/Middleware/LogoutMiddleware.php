<?php

namespace App\Http\Middleware;


use Illuminate\Http\Response;
use Closure;
use Illuminate\Http\Request;


class LogoutMiddleware
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
        
        $response = $next($request);
        $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
        $response->header('Pragma','no-cache');
        $response->header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
        return $response;
        
        
    }
}
