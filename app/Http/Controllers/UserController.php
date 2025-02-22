<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_dashboard(){
        return view('user.user_index');
    }

    public function home(){
        return view('user.user_index');
    }
}
