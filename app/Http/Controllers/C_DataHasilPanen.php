<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\M_DataHasilPanen;

class C_DataHasilPanen extends Controller
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

    public function setTableDataHasilPanen()
    {
        // $query = DB::table('data_perawatan')->select('id_jenismelon')->get()->toArray();
        // $query = DB::table("jenis_melon")->select('*')->whereNotIn('id_jenismelon',function($query) {

        //     $query->select('id_jenismelon')->from('data_perawatan');
         
        //  })->get();
        // dd($query);

        $data = M_DataHasilPanen::join('jenis_melon', 'hasil_panen.id_jenismelon', '=', 'jenis_melon.id_jenismelon')
                                        ->join('no_greenhouse', 'hasil_panen.id_greenhouse', '=', 'no_greenhouse.id_greenhouse')
                                        ->join('users', 'hasil_panen.id_akun', '=', 'users.id')
                                        ->get();
        // dd($datapencatatan);
        
        return view('hasilpanen.V_DataHasilPanen', compact('data'));
    }

    public function setFormInputHasilPanen()
    {
        $jenismelon = DB::table('jenis_melon')->orderBy('jenismelon')->get();
        // $jenismelon = DB::table("jenis_melon")->select('*')->whereIn('id_jenismelon',function($query) {
        //     $query->select('id_jenismelon')->from('data_perawatan');
        //  })->get();
        $nogrenhouse = DB::table('no_greenhouse')->orderBy('no_greenhouse')->get();
        // $nogrenhouse = DB::table("no_greenhouse")->select('*')->whereIn('id_greenhouse',function($query) {
        //     $query->select('id_greenhouse')->from('data_perawatan');
        //  })->get();
        return view('hasilpanen.V_InputHasilPanen', ['jenismelon' => $jenismelon, 'nogrenhouse' => $nogrenhouse]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function InputDataHasilPanen(Request $request)
    {

        M_DataHasilPanen::create([
            'id_jenismelon' => $request->jenis_melon,
            'id_greenhouse' => $request->no_greenhouse,
            'tanggal_hasilpanen' => $request->tanggal_hasilpanen,
            'id_akun' => $request->pencatat,
            'jumlah_hasilpanen' => $request->jumlah_hasilpanen
        ]);

            return redirect('hasilpanen')->with('status', 'Berhasil Menambahkan Data Hasil Panen');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setFormInputEditHasilPanen($id)
    {
        $jenismelon = DB::table('jenis_melon')->orderBy('jenismelon')->get();
        $nogrenhouse = DB::table('no_greenhouse')->orderBy('no_greenhouse')->get();

        $data = M_DataHasilPanen::where('id_hasilpanen', $id)->first();

        $data->tanggal_hasilpanen = strtotime($data->tanggal_hasilpanen);
        $data->tanggal_hasilpanen = date('Y-m-d',$data->tanggal_hasilpanen);

        // dd($data);
        return view('hasilpanen.V_EditHasilPanen', ['data' => $data, 'jenismelon' => $jenismelon, 'nogrenhouse' => $nogrenhouse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateDataHasilPanen(Request $request, $id)
    {
        //metode sistem pakar
        $data = DB::table('jenis_melon')
            ->where('id_jenismelon', '=', $request->jenis_melon)
            ->first();
        
            M_DataHasilPanen::where('id_hasilpanen', $id)
            ->update([
                'id_jenismelon' => $request->jenis_melon,
                'id_greenhouse' => $request->no_greenhouse,
                'tanggal_hasilpanen' => $request->tanggal_hasilpanen,
                'id_akun' => $request->pencatat,
                'jumlah_hasilpanen' => $request->jumlah_hasilpanen
            ]);
            return redirect('hasilpanen')->with('status', 'Data Hasil Panen Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        M_DataPerawatan::destroy($id);
        return redirect('gagalpanen')->with('status', 'Data Pencatatan Perkembangan Melon Berhasil Dihapus');
    }
}