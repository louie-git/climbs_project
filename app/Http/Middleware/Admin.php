<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class Admin
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

                if($user->department_name == "Admin"){
                    return $next($request);
                }
                if($user->department_name != "Admin"){
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
