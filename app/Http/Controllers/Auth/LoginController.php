<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
 protected function authenticated(Request $request, $user)
    { 
        if(Auth::user()){   
            foreach(Auth::user()->department as $user){
               if($user->department_name == 'Non-Life' && Auth::user()->acc_status == 'Enabled'){
                return redirect('/non_life_dept');
               }
               if($user->department_name == 'Life' && Auth::user()->acc_status == 'Enabled'){
                return redirect('/life_dept');
               }
               if($user->department_name == 'Admin' && Auth::user()->acc_status == 'Enabled'){
                return redirect('/life_documents');
               }
               if($user->department_name == 'Super Admin' && Auth::user()->acc_status == 'Enabled'){
                return redirect('/accounts');
               }
               else{
                return back()->with('error','Account on Hold!!, Please Contact Admin');
                }
               
            }
            
            
        }
        // if(Auth::user()->branch=='CDO'){    
        //     return redirect('/dashboard');
        // }
        // if(Auth::user()->branch=='CEBU'){
        //     return redirect('/cebu_dashboard');
        // }
        // if(Auth::user()->branch=='DAVAO'){
        //     return redirect('/davao_dashboard');
        // }
      
        
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
