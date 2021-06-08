<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class SuperAdmin
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
        if(Auth::user()){
            foreach(Auth::user()->department as $user){

                if($user->department_name == "Super Admin"){
                    return $next($request);
                }
                if($user->department_name != "Super Admin"){
                    return abort(401);
                }
                else{
                    return redirect('/');
                }
                
            }
        }else{
            return redirect('/');
        }
    }
}
