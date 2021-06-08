<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class NonLife
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

                if($user->department_name == "Non-Life"){
                    return $next($request);
                }
                if($user->department_name != "Non-Life"){
                    return abort(401);
                }
                else{
                    return redirect('/');
                }
                
            }
        }else{
            return redirect('/');
        }
        // if(Auth::user() && \Auth::user()->acc_position =='City_Admin')
        // {
        //     return $next($request);
            
        // }
        // if(Auth::user() && \Auth::user()->acc_position !='City_Admin' )
        // {
            
        //         return abort(403);
        // }
        // else
        // {
        //     return redirect('/signin');
        // }
        
    }
}
