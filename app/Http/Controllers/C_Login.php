<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index()
    {
        return view('index');
    }
    public function setHome()
    {
        if(Auth::check()){
            $count = DB::table('users')->count();
            $catat = DB::table('data_perawatan')->count();
            // $gagal = DB::table('gagal_panen')->get()->sum("jumlah_gagalpanen");
            $gagal = DB::table('hasil_panen')->get()->sum("jumlah_gagalpanen");
            $hasil = DB::table('hasil_panen')->get()->sum("jumlah_hasilpanen");
            return view('V_Home', compact('count', 'catat', 'gagal', 'hasil'));
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
