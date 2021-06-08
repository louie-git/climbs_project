<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AccountsController extends Controller
{
    public function accounts(){
            $accounts = User::all();
            return view('pages.super_admin.superAdminDashboard')->with('accounts',$accounts);
        
        
    }
    public function search(Request $request){
        $accounts = User::where('last_name', 'LIKE', '%' . $request->search_account . '%')->get();
        return view('pages.super_admin.superAdminDashboard')->with('accounts',$accounts);
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->acc_status = $request->status;
        $user->save();
        return back()->with('success','Account Successfully Updated: '.$user->last_name.", ".$user->first_name." ".$user->middle_name." - ".$request->status);
    }

    public function lifeAccounts(){
        $accounts = User::whereHas('department',
            function($query){
                $query->where('department_name','Life');
            }
        )->get();
        return view('pages.super_admin.superAdminDashboard')->with('accounts',$accounts);
    }

    public function nonLifeAccounts(){
        $accounts = User::whereHas('department',
            function($query){
                $query->where('department_name','Non-Life');
            }
        )->get();
        return view('pages.super_admin.superAdminDashboard')->with('accounts',$accounts);
    }

    public function adminAccounts(){
        $accounts = User::whereHas('department',
            function($query){
                $query->where('department_name','Admin');
            }
        )->get();
        return view('pages.super_admin.superAdminDashboard')->with('accounts',$accounts);
    }

}
