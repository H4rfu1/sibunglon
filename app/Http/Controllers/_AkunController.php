<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunController extends Controller
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
    public function pemimpin()
    {
        return view('akun/pemimpin');
    }
    public function pengawas()
    {
        return view('akun/pengawas');
    }
    public function admin()
    {
        return view('akun/admin');
    }
    public function buatakun()
    {
        return view('akun/buatakun');
    }
}
