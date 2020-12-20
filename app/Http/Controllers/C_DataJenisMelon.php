<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\M_JenisMelon;

class C_DataJenisMelon extends Controller
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

    public function setTableJanisMelon()
    {
        // $query = DB::table('data_perawatan')->select('id_jenismelon')->get()->toArray();
        // $query = DB::table("jenis_melon")->select('*')->whereNotIn('id_jenismelon',function($query) {

        //     $query->select('id_jenismelon')->from('data_perawatan');
         
        //  })->get();
        // dd($query);

        $data = M_JenisMelon::all();
        // dd($datapencatatan);
        return view('jenismelon.V_DataJenisMelon', compact('data'));
    }

    public function setFormInputJenisMelon()
    {
        return view('jenismelon.V_InputJenisMelon');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function InputDataJenisMelon(Request $request)
    {

        M_JenisMelon::create([
            'jenismelon' => $request->jenismelon,
            'masa_panen' => $request->masa_panen,
            'masa_pupuk' => $request->masa_pupuk,
            'keterangan' => $request->keterangan
        ]);

            return redirect('jenismelon')->with('status', 'Berhasil Menambahkan Data Jenis Melon');
        
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
    public function setFormInputEditJenisMelon($id)
    {

        $data = M_JenisMelon::where('id_jenismelon', '=', $id)->first();

        // dd($data);
        return view('jenismelon.V_EditJenisMelon', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateDataJenisMelon(Request $request, $id)
    {
            M_JenisMelon::where('id_jenismelon', $id)
            ->update([
                'jenismelon' => $request->jenismelon,
                'masa_panen' => $request->masa_panen,
                'masa_pupuk' => $request->masa_pupuk,
                'keterangan' => $request->keterangan
            ]);
            return redirect('jenismelon')->with('status', 'Data Jenis Melon Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        M_JenisMelon::destroy($id);
        return redirect('jenismelon')->with('status', 'Data Jenis Melon Berhasil Dihapus');
    }
}