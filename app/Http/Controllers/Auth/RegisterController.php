<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Branch;
use App\Department;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(){
        $branch = Branch::all();
        $dept = Department::all();
        return view('pages.super_admin.registerAccount')->with('branch',$branch)->with('dept',$dept);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'last_name' => ['required', 'string', 'max:255'],
    //         'first_name' => ['required', 'string', 'max:255'],
    //         'middle_name' => [ 'string', 'max:255'],
    //         // 'branch' => [ 'required','string', 'max:255'],
    //         'gender' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'last_name' => $data['last_name'],
    //         'first_name' => $data['first_name'],
    //         'middle_name' => $data['middle_name'],
    //         'gender' => $data['gender'],
    //         // 'branch' => $data['branch'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function registerAccount(Request $request){
    
        $request->validate([
            'email' => 'unique:users' ,
            'password' => 'required|string|min:8|same:password_confirmation',
        ]);

        $user = new User;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->acc_status = "Disabled";
        $user->save();
        $save = User::with('department')->latest()->first();
        $save->department()->attach($request->dept);
        $save = User::with('branch')->latest()->first();
        $save->branch()->attach($request->branch);
        return back()->with('success','Account Successfully Created');


    }
}
