<?php

namespace App\Http\Controllers;
use App\User;
use App\Department;
use App\Branch;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function test(){
        $user = User::with('branch')->get();
        return $user;
    }
}
