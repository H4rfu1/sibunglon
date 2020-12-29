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
            $hasil = DB::table('hasil_panen')->get()->sum("jumlah_hasilpanen");
            
            $jan = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-01-01', '2020-01-31'])->get()->sum("jumlah_hasilpanen");
            $feb = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-02-01', '2020-02-30'])->get()->sum("jumlah_hasilpanen");
            $mar = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-03-01', '2020-03-31'])->get()->sum("jumlah_hasilpanen");
            $apr = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-04-01', '2020-04-30'])->get()->sum("jumlah_hasilpanen");
            $may = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-05-01', '2020-05-31'])->get()->sum("jumlah_hasilpanen");
            $jun = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-06-01', '2020-06-30'])->get()->sum("jumlah_hasilpanen");
            $jul = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-07-01', '2020-07-31'])->get()->sum("jumlah_hasilpanen");
            $aug = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-08-01', '2020-08-31'])->get()->sum("jumlah_hasilpanen");
            $sep = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-09-01', '2020-09-30'])->get()->sum("jumlah_hasilpanen");
            $nov = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-10-01', '2020-10-31'])->get()->sum("jumlah_hasilpanen");
            $okt = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-11-01', '2020-11-30'])->get()->sum("jumlah_hasilpanen");
            $des = DB::table('hasil_panen')->whereBetween('tanggal_hasilpanen', ['2020-12-01', '2020-12-31'])->get()->sum("jumlah_hasilpanen");
            // dd($jan);
            return view('V_Home', compact('count', 'catat', 'hasil', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'nov', 'okt', 'des'));
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
