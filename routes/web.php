<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    //     return view('auth.login');
    // });
    // Route::get('/login', function () {
        //     return view('login');
        // });
        
Route::get('/', 'C_Home@index');

//kelola akun
Route::get('/profil/{id}', 'AkunController@index');

Route::patch('/profil/{id}', 'AkunController@update');

Route::delete('/profil/{id}', 'AkunController@destroy');

Route::get('/profil/{id}/edit', 'AkunController@edit');

Route::post('/daftarakun', 'AkunController@store');

Route::get('/buatakun/{role}', 'AkunController@setFormInputDaftar');

Route::get('/akun/{role}', 'AkunController@akun');


//kelola pencatatan
Route::get('/pencatatan', 'C_DataPencatatan@setListTableDataPencatatan');

Route::get('/inputpencatatan', 'C_DataPencatatan@setFormInputPencatatan');

Route::post('/simpanpencatatan', 'C_DataPencatatan@InputDataPencatatan');

Route::get('/editpencatatan/{id}', 'C_DataPencatatan@setFormInputEditPencatatan');

Route::get('/pencatatan/{id}', 'C_DataPencatatan@setTableDataPencatatan');

Route::patch('/pencatatan/{id}', 'C_DataPencatatan@UpdateDataPencatatan');

// Route::delete('/pencatatan/{id}', 'C_DataPencatatan@destroy');

//kelola No Greenhouse
// Route::get('/gagalpanen', 'C_DataGagalPanen@setTableDataGagalPanen');

// Route::get('/inputgagalpanen', 'C_DataGagalPanen@setFormInputGagalPanen');

// Route::post('/simpangagalpanen', 'C_DataGagalPanen@InputDataGagalPanen');

// Route::get('/editgagalpanen/{id}', 'C_DataGagalPanen@setFormInputEditGagalPanen');

// Route::get('/pencatatan/{id}', 'C_DataGagalPanen@setTableDataPencatatan');

// Route::patch('/gagalpanen/{id}', 'C_DataGagalPanen@UpdateDataGagalPanen');

//kelola Jenis Melon
Route::get('/jenismelon', 'C_DataJenisMelon@setTableJanisMelon');

Route::get('/inputjenismelon', 'C_DataJenisMelon@setFormInputJenisMelon');

Route::post('/simpanjenismelon', 'C_DataJenisMelon@InputDataJenisMelon');

Route::get('/editjenismelon/{id}', 'C_DataJenisMelon@setFormInputEditJenisMelon');

Route::patch('/jenismelon/{id}', 'C_DataJenisMelon@UpdateDataJenisMelon');

//kelola Hasil Panen
Route::get('/hasilpanen', 'C_DataHasilPanen@setTableDataHasilPanen');

Route::get('/inputhasilpanen', 'C_DataHasilPanen@setFormInputHasilPanen');

Route::post('/simpanhasilpanen', 'C_DataHasilPanen@InputDataHasilPanen');

Route::get('/edithasilpanen/{id}', 'C_DataHasilPanen@setFormInputEditHasilPanen');

Route::get('/GetDataPerawatan/{id}', 'C_DataHasilPanen@getDataPerawatan');

// Route::get('/pencatatan/{id}', 'C_DataHasilPanen@setTableDataPencatatan');

Route::patch('/hasilpanen/{id}', 'C_DataHasilPanen@UpdateDataHasilPanen');

//perawatan
Route::get('/perawatan', 'C_Perawatan@setListPerawatan')->name('perawatan');
Route::get('/perawatan/{id}', 'C_Perawatan@aksiPerawatan');


//auth
Auth::routes();

Route::get('/masuk', 'C_Login@setFormLogin');
Route::get('/home', 'C_Login@setHome')->name('home');