<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function folder1_upload(){
        return view('pages.folder1');
    }
}
