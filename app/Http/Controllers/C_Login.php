<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class C_Login extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setHome()
    {
        if(Auth::check()){
            return view('V_Home');
        }else{
            return redirect('/login');
        }
    }
    public function setFormLogin()
    {
        if(Auth::check()){
            return redirect('/home');
        }else{
            return view('auth.login');
        }
    }

}
