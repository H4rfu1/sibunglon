<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\M_DataGagalPanen;

class C_DataGagalPanen extends Controller
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

    public function setTableDataGagalPanen()
    {
        // $query = DB::table('data_perawatan')->select('id_jenismelon')->get()->toArray();
        // $query = DB::table("jenis_melon")->select('*')->whereNotIn('id_jenismelon',function($query) {

        //     $query->select('id_jenismelon')->from('data_perawatan');
         
        //  })->get();
        // dd($query);

        $data = M_DataGagalPanen::join('jenis_melon', 'gagal_panen.id_jenismelon', '=', 'jenis_melon.id_jenismelon')
                                        ->join('no_greenhouse', 'gagal_panen.id_greenhouse', '=', 'no_greenhouse.id_greenhouse')
                                        ->join('users', 'gagal_panen.id_akun', '=', 'users.id')
                                        ->get();
        // dd($datapencatatan);
        
        return view('gagalpanen.V_DataGagalPanen', compact('data'));
    }

    public function setFormInputGagalPanen()
    {
        $jenismelon = DB::table('jenis_melon')->orderBy('jenismelon')->get();
        // $jenismelon = DB::table("jenis_melon")->select('*')->whereNotIn('id_jenismelon',function($query) {
        //     $query->select('id_jenismelon')->from('data_perawatan');
        //  })->get();
        $nogrenhouse = DB::table('no_greenhouse')->orderBy('no_greenhouse')->get();
        $nogrenhouse = DB::table("no_greenhouse")->select('*')->whereIn('id_greenhouse',function($query) {
            $query->select('id_greenhouse')->from('data_perawatan');
         })->get();
        return view('gagalpanen.V_InputGagalPanen', ['jenismelon' => $jenismelon, 'nogrenhouse' => $nogrenhouse]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function InputDataGagalPanen(Request $request)
    {
        //metode sistem pakar
        $data = DB::table('jenis_melon')
            ->where('id_jenismelon', '=', $request->jenis_melon)
            ->first();
        $tanampanen = strtotime($request->tanggal_tanam . " +". $data->masa_panen ." days");
        $tanampanen = date('Y-m-d',$tanampanen);
        $tanampupuk = strtotime($request->tanggal_tanam . " +". $data->masa_pupuk ." days");
        $tanampupuk = date('Y-m-d',$tanampupuk);

        M_DataGagalPanen::create([
            'id_jenismelon' => $request->jenis_melon,
            'id_greenhouse' => $request->no_greenhouse,
            'tanggal_gagalpanen' => $request->tanggal_gagalpanen,
            'id_akun' => $request->pencatat,
            'jumlah_gagalpanen' => $request->jumlah_gagalpanen,
            'penyebab_gagalpanen' => $request->penyebab_gagalpanen
        ]);

            return redirect('gagalpanen')->with('status', 'Berhasil Menambahkan Data Gagal Panen');
        
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
    public function setFormInputEditGagalPanen($id)
    {
        $jenismelon = DB::table('jenis_melon')->orderBy('jenismelon')->get();
        $nogrenhouse = DB::table('no_greenhouse')->orderBy('no_greenhouse')->get();

        $data = M_DataGagalPanen::where('id_gagalpanen', $id)->first();

        $data->tanggal_gagalpanen = strtotime($data->tanggal_gagalpanen);
        $data->tanggal_gagalpanen = date('Y-m-d',$data->tanggal_gagalpanen);

        // dd($data);
        return view('gagalpanen.V_EditGagalPanen', ['data' => $data, 'jenismelon' => $jenismelon, 'nogrenhouse' => $nogrenhouse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateDataGagalPanen(Request $request, $id)
    {
        //metode sistem pakar
        $data = DB::table('jenis_melon')
            ->where('id_jenismelon', '=', $request->jenis_melon)
            ->first();
        
            M_DataGagalPanen::where('id_gagalpanen', $id)
            ->update([
                'id_jenismelon' => $request->jenis_melon,
                'id_greenhouse' => $request->no_greenhouse,
                'tanggal_gagalpanen' => $request->tanggal_gagalpanen,
                'id_akun' => $request->pencatat,
                'jumlah_gagalpanen' => $request->jumlah_gagalpanen,
                'penyebab_gagalpanen' => $request->penyebab_gagalpanen
            ]);
            return redirect('gagalpanen')->with('status', 'Data Gagal Panen Berhasil Disimpan');
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