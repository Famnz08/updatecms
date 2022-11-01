<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function login(){
        return view('auth/login');
    }
    public function postlogin(Request $request){
        if(Auth::Attempt($request->only('email','password'))){
            return redirect('/artikel');
        }
        return redirect('/login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
