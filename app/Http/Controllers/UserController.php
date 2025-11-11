<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users= User::orderby('id','desc')->paginate(env('PAGINATION_COUNT',10));
        return view('users.index',compact('usera'));

    }
}
