<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Auth;
class AuthController extends Controller
{
    public function login(){
        return view('auth/login');
    }
    public function postlogin(Request $request){
        //if(Auth::Attempt($request->only('email','password')))
        //$request->session()->regenerate();
        //$take=Auth::User()->level;
        
       // if($take=='admin'){
           // return redirect()->intended('artikel');
       // }elseif($take=='karyawan'){
        //    return redirect()->intended('karyawan');
       // }
       // return redirect('/login');
        
       if(Auth::Attempt($request->only('email','password'))){
        $request->session()->regenerate();
        $take=Auth::User()->level;

        if($take=='admin'){
            return redirect()->intended('artikel');
        }elseif ($take=='karyawan') {
            return redirect()->intended('artikel');
        }
    
    }
    return back()->withErrors(['password'=>'Password yang anda masukkan salah!',
                               'password'=>'Password yang anda masukkan salah!',
                             ]);
                             return redirect('/login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function register(){
        return view('auth/register');
    }
    public function simpanregister(Request $request){
        $this->validate($request,[
            'password'=>'required',
            'name'=>'required',
        ],messages:[
            'name.required'=>'Nama harus terdiri 8-20 Huruf',
            'password.required'=>'Password harus terdiri 2-20'
        ]);
        User::create([
            'name'=> $request->name,
            'level'=> 'karyawan',
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'remember_token'=> Str::random(60),
        ]);
        return redirect('/login');
        
    }
}
