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

//kelola Gagal Panen
Route::get('/gagalpanen', 'C_DataGagalPanen@setTableDataGagalPanen');

Route::get('/inputgagalpanen', 'C_DataGagalPanen@setFormInputGagalPanen');

Route::post('/simpangagalpanen', 'C_DataGagalPanen@InputDataGagalPanen');

Route::get('/editgagalpanen/{id}', 'C_DataGagalPanen@setFormInputEditGagalPanen');

// Route::get('/pencatatan/{id}', 'C_DataGagalPanen@setTableDataPencatatan');

Route::patch('/gagalpanen/{id}', 'C_DataGagalPanen@UpdateDataGagalPanen');


Auth::routes();

Route::get('/home', 'C_Login@setHome')->name('home');
Route::get('/', 'C_Login@setFormLogin');