<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\M_NoGreenhouse;

class C_DataNoGreenhouse extends Controller
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

    public function setTableDataNoGreenhouse()
    {

        $data = M_NoGreenhouse::all();
        // dd($datapencatatan);
        return view('nogreenhouse.V_DataNoGreenHouse', compact('data'));
    }

    public function setFormInputNoGreenhouse()
    {
        return view('nogreenhouse.V_InputNoGreenhouse');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function InputDataNoGreenhouse(Request $request)
    {
        M_NoGreenhouse::create([
            'no_greenhouse' => $request->no_greenhouse
        ]);

            return redirect('greenhouse')->with('status', 'Berhasil Menambahkan Data No Grenhouse');
        
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
    public function setFormInputEditNoGreenhouse($id)
    {

        $data = M_NoGreenhouse::where('id_greenhouse', '=', $id)->first();

        // dd($data);
        return view('nogreenhouse.V_EditNoGreenhouse', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateDataNoGreenhouse(Request $request, $id)
    {
            M_NoGreenhouse::where('id_greenhouse', $id)
            ->update([
                'no_greenhouse' => $request->no_greenhouse
            ]);
            return redirect('greenhouse')->with('status', 'Data No Grenhouse Berhasil Disimpan');
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
        return redirect('gagalpanen')->with('status', 'Data Pencatatan No Grenhouse Berhasil Dihapus');
    }
}