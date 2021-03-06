<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function akun($role)
    {
        if($role == 'pemimpin'){
            $pemimpin = User::where('id_role', 3)->get();
            return view('akun.V_AkunPimpinan', compact('pemimpin'));
        }elseif($role == 'pengawas'){
            $pengawas = User::where('id_role', 2)->get();
            // dd($pengawas);
            return view('akun.V_AkunPengawas', compact('pengawas'));
        }elseif($role == 'admin'){
            $admin = User::where('id_role', 1)->get();
            return view('akun.V_AkunStaffAdministrasi', compact('admin'));
        }else{
            $pemimpin = User::where('id_role', 2)->get();
            return view('akun.V_AkunPengawas', ['pemimpin' => $pemimpin]);
        }
    }
    public function setFormInputDaftar($role)
    {
        return view('akun.V_InputAkun', compact('role'));
    }

    public function index($id)
    {
        $data = User::where('id', $id)->first();
        // dd($data);
        return view('akun.V_Profil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = new User;
        // $user->name = $request->name;
        // $user->id_role = (int)$request->role;
        // $user->tempat_lahir = $request->tempat_lahir;
        // $user->tanggal_lahir = $request->tanggal_lahir;
        // $user->jenis_kelamin = $request->jenis_kelamin;
        // $user->alamat = $request->alamat;
        // $user->no_hp = $request->no_hp;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);

        // $user->save();
        // $request->validate([
        //     'name' => 'required',
        //     'id_role' => 'required',
        //     'tempat_lahir' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'alamat' => 'required',
        //     'no_hp' => 'required',
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);


        User::create([
            'name' => $request->name,
            'id_role' => (int)$request->role,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if((int)$request->role == 1){
            return redirect('akun/admin')->with('status', 'Data Admin Berhasil ditambah');
        }elseif((int)$request->role == 2){
            return redirect('akun/pengawas')->with('status', 'Berhasil menambahkan data akun pengawas');
        }elseif((int)$request->role == 3){
            return redirect('akun/pemimpin')->with('status', 'Berhasil menambahkan data akun pemimpin');
        }

        
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
        // return view('akun.V_AkunPengawas', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        $data->tanggal_lahir = strtotime($data->tanggal_lahir);
        $data->tanggal_lahir = date('Y-m-d',$data->tanggal_lahir);
        // dd($data);
        return view('akun.editakun', compact('data'));
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
        // $user = User::find($id);
        // $user->name = $request->name;
        // $user->tempat_lahir = $request->tempat_lahir;
        // $user->tanggal_lahir = $request->tanggal_lahir;
        // $user->jenis_kelamin = $request->jenis_kelamin;
        // $user->alamat = $request->alamat;
        // $user->no_hp = $request->no_hp;
        // $user->email = $request->email;

        // $user->save();

        User::where('id', $id)
            ->update([
                'name' => $request->name,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            if((int)$request->role == 1){
                return redirect('akun/admin')->with('status', 'Data Admin Berhasil diubah');
            }elseif((int)$request->role == 2){
                return redirect('akun/pengawas')->with('status', 'Berhasil mengubah data akun pengawas');
            }elseif((int)$request->role == 3){
                return redirect('akun/pemimpin')->with('status', 'Berhasil mengubah data akun pemimpin');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        User::destroy($id);
        if((int)$request->role == 1){
            return redirect('akun/admin')->with('status', 'Data Admin Berhasil diubah');
        }elseif((int)$request->role == 2){
            return redirect('akun/pengawas')->with('status', 'Berhasil menghapus data akun pengawas');
        }elseif((int)$request->role == 3){
            return redirect('akun/pemimpin')->with('status', 'Berhasil menghapus data akun pemimpin');
        }
    }
}
