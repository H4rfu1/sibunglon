<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\M_Aksi_perawatan;
use App\M_DetailPerawatan;
use Auth;

class C_Perawatan extends Controller
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

    public function setListPerawatan()
    {
        $datapencatatan = M_DetailPerawatan::join('data_perawatan', 'detail_perawatan.id_data_perawatan', '=', 'data_perawatan.id_dataperawatan')
                                        ->join('jenis_melon', 'data_perawatan.id_jenismelon', '=', 'jenis_melon.id_jenismelon')
                                        ->join('no_greenhouse', 'data_perawatan.id_greenhouse', '=', 'no_greenhouse.id_greenhouse')
                                        ->join('users', 'data_perawatan.id_akun', '=', 'users.id')
                                        ->get();    
        // dd($datapencatatan);
        
        return view('pencatatan.V_Perawatan', ['datapencatatan' => $datapencatatan]);
    }

    public function aksiPerawatan($id)
    {
        $datapencatatan = M_DetailPerawatan::where('detail_perawatan.id_detail_perawatan', $id)
                                        ->first();
        // dd($datapencatatan);
        $count = M_DetailPerawatan::join('aksi_perawatan', 'detail_perawatan.id_detail_perawatan', '=', 'aksi_perawatan.id_detail_perawatan')
                                        ->where('detail_perawatan.id_detail_perawatan', $id)
                                        ->count();
        $data = M_DetailPerawatan::join('aksi_perawatan', 'detail_perawatan.id_detail_perawatan', '=', 'aksi_perawatan.id_detail_perawatan')
        ->where('detail_perawatan.id_detail_perawatan', $id)
        ->first();
        
        if ($count > 0){
            M_DetailPerawatan::where('id_detail_perawatan', $id)
            ->update([
                'status' => 'Belum ada aksi']);
                M_Aksi_perawatan::where('id_aksi_perawatan', $data->id_aksi_perawatan)->delete();
                echo "Belum ada aksi";

        }else{          
            $datapencatatan->tanggal_perawatan = strtotime($datapencatatan->tanggal_perawatan);
            $datapencatatan->tanggal_perawatan = date('Y-m-d',$datapencatatan->tanggal_perawatan);
            $tanggal = $datapencatatan->tanggal_perawatan;

            if(date("Y-m-d") == $tanggal){
                $status = 'Tepat waktu';
            }elseif(date("Y-m-d") < $tanggal){
                $status = 'Terlalu cepat';
            }else{
                $status = 'Terlambat';
            }     
            M_Aksi_perawatan::create([
                'id_detail_perawatan' => $id,
                'id_perawat' => Auth::user()->id,
                'tanggal_aksi_perawatan' => date("Y-m-d H:i:s")
            ]);
            M_DetailPerawatan::where('id_detail_perawatan', $id)
            ->update([
                'status' => $status]);
                echo "$status";
                redirect('/perawatan');
        }
        
    }
}