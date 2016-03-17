<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class ApiAuth
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
    	//Sentinel::authenticate(['email'=>'andreibm@yahoo.com','password'=>'andrei']);
    	if(!Sentinel::getUser()){
			return response()->json(['body'=>'unauthorized'],200);
    	}
        return $next($request);
    }
}
