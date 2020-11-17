<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\M_DataPencatatan;

class C_DataPencatatan extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $datapencatatan = M_DataPencatatan::join('jenis_melon', 'data_perawatan.id_jenismelon', '=', 'jenis_melon.id_jenismelon')
                                        ->join('no_greenhouse', 'data_perawatan.id_greenhouse', '=', 'no_greenhouse.id_greenhouse')
                                        ->join('users', 'data_perawatan.id_akun', '=', 'users.id')
                                        ->get();
        // dd($datapencatatan);
        
        return view('pencatatan.V_DataPencatatan', ['datapencatatan' => $datapencatatan]);
    }

    public function buatPencatatan()
    {
        $jenismelon = DB::table('jenis_melon')->orderBy('jenismelon')->get();
        $nogrenhouse = DB::table('no_greenhouse')->orderBy('no_greenhouse')->get();
        return view('pencatatan.V_InputPencatatan', ['jenismelon' => $jenismelon, 'nogrenhouse' => $nogrenhouse]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        M_DataPencatatan::create([
            'id_jenismelon' => $request->jenis_melon,
            'id_greenhouse' => $request->no_greenhouse,
            'tanggal_tanam' => $request->tanggal_tanam,
            'id_akun' => $request->pencatat,
            'tanggal_pemberianpupuk' => $request->tanggal_pemupukan,
            'prediksi_tanggalpanen' => $request->tanggal_panen
        ]);

            return redirect('pencatatan')->with('status', 'Berhasil Menambahkan Data Pencatatan Perkembangan Melon');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::where('id', $id)->get();
        // return view('akun.pengawas', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenismelon = DB::table('jenis_melon')->orderBy('jenismelon')->get();
        $nogrenhouse = DB::table('no_greenhouse')->orderBy('no_greenhouse')->get();

        $data = M_DataPencatatan::where('id_dataperawatan', $id)->first();

        $data->tanggal_tanam = strtotime($data->tanggal_tanam);
        $data->tanggal_tanam = date('Y-m-d',$data->tanggal_tanam);

        $data->tanggal_pemberianpupuk = strtotime($data->tanggal_pemberianpupuk);
        $data->tanggal_pemberianpupuk = date('Y-m-d',$data->tanggal_pemberianpupuk);

        $data->prediksi_tanggalpanen = strtotime($data->prediksi_tanggalpanen);
        $data->prediksi_tanggalpanen = date('Y-m-d',$data->prediksi_tanggalpanen);

        // dd($data);
        return view('pencatatan.V_EditPencatatan', ['data' => $data, 'jenismelon' => $jenismelon, 'nogrenhouse' => $nogrenhouse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        M_DataPencatatan::where('id_dataperawatan', $id)
            ->update([
                'id_jenismelon' => $request->jenis_melon,
                'id_greenhouse' => $request->no_greenhouse,
                'tanggal_tanam' => $request->tanggal_tanam,
                'id_akun' => $request->pencatat,
                'tanggal_pemberianpupuk' => $request->tanggal_pemupukan,
                'prediksi_tanggalpanen' => $request->tanggal_panen
            ]);
            return redirect('pencatatan')->with('status', 'Data Pencatatan Perkembangan Melon Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "delete";
    }
}