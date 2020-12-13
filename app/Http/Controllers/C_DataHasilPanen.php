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

        $data = M_DataHasilPanen::join('data_perawatan', 'hasil_panen.id_data_perawatan', '=', 'data_perawatan.id_dataperawatan')
                                        ->join('jenis_melon', 'data_perawatan.id_jenismelon', '=', 'jenis_melon.id_jenismelon')
                                        ->join('no_greenhouse', 'data_perawatan.id_greenhouse', '=', 'no_greenhouse.id_greenhouse')
                                        ->join('users', 'hasil_panen.id_akun', '=', 'users.id')
                                        ->get();
        // dd($data);
        
        return view('hasilpanen.V_DataHasilPanen', compact('data'));
    }

    public function setFormInputHasilPanen()
    {
        // $jenismelon = DB::table('jenis_melon')->orderBy('jenismelon')->get();
        // $jenismelon = DB::table("jenis_melon")->select('*')->whereIn('id_jenismelon',function($query) {
        //     $query->select('id_jenismelon')->from('data_perawatan');
        //  })->get();
        // $nogrenhouse = DB::table('no_greenhouse')->orderBy('no_greenhouse')->get();
        // $nogrenhouse = DB::table("no_greenhouse")->select('*')->whereIn('id_greenhouse',function($query) {
        //     $query->select('id_greenhouse')->from('data_perawatan');
        //  })->get();
        $data_perawatan = DB::table('data_perawatan')->orderBy('id_dataperawatan')->get();

        return view('hasilpanen.V_InputHasilPanen', compact('data_perawatan'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function InputDataHasilPanen(Request $request)
    {
        if($request->persentase_panen >= 80){
            $status = 'berhasil';
        }else{
            $status = 'gagal';
        }
        $jumlah_gagalpanen = (100 - $request->persentase_panen) / $request->persentase_panen * $request->jumlah_hasilpanen;

        M_DataHasilPanen::create([
            'id_data_perawatan' => $request->id_data_perawatan,
            'persentase_panen' => $request->persentase_panen,
            'tanggal_hasilpanen' => $request->tanggal_hasilpanen,
            'id_akun' => $request->pencatat,
            'jumlah_hasilpanen' => $request->jumlah_hasilpanen,
            'jumlah_gagalpanen' => $jumlah_gagalpanen,
            'status' => $status
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
        // $jenismelon = DB::table('jenis_melon')->orderBy('jenismelon')->get();
        // $nogrenhouse = DB::table('no_greenhouse')->orderBy('no_greenhouse')->get();

        $data = M_DataHasilPanen::join('data_perawatan', 'hasil_panen.id_data_perawatan', '=', 'data_perawatan.id_dataperawatan')
                                ->join('jenis_melon', 'data_perawatan.id_jenismelon', '=', 'jenis_melon.id_jenismelon')
                                ->join('no_greenhouse', 'data_perawatan.id_greenhouse', '=', 'no_greenhouse.id_greenhouse')
                                ->where('id_hasilpanen', $id)->first();
        $data_perawatan = DB::table('data_perawatan')->orderBy('id_dataperawatan')->get();

        $data->tanggal_hasilpanen = strtotime($data->tanggal_hasilpanen);
        $data->tanggal_hasilpanen = date('Y-m-d',$data->tanggal_hasilpanen);

        // dd($data);
        return view('hasilpanen.V_EditHasilPanen', compact('data_perawatan', 'data'));
    }

    public function getDataPerawatan($id)
    {
        $data_perawatan = DB::table('data_perawatan')        
            ->join('no_greenhouse', 'data_perawatan.id_greenhouse', '=', 'no_greenhouse.id_greenhouse')
            ->join('jenis_melon', 'data_perawatan.id_jenismelon', '=', 'jenis_melon.id_jenismelon')
            ->where('data_perawatan.id_dataperawatan', $id)
            ->first();
            // dd($nogreenhouse);
            echo json_encode($data_perawatan);
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