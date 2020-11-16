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

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/login', function () {
//     return view('login');
// });

//kelola akun
Route::get('/profil/{id}', 'AkunController@index');

Route::patch('/profil/{id}', 'AkunController@update');

Route::get('/profil/{id}/edit', 'AkunController@edit');

Route::post('/daftarakun', 'AkunController@store');

Route::get('/buatakun/{role}', 'AkunController@buatakun');

Route::get('/akun/{role}', 'AkunController@akun');

//kelola pencatatan
Route::get('/pencatatan', 'C_DataPencatatan@index');

Route::get('/inputpencatatan', 'C_DataPencatatan@buatPencatatan');

Route::post('/simpanpencatatan', 'C_DataPencatatan@store');

Route::get('/editpencatatan/{id}', 'C_DataPencatatan@edit');

Route::post('/editpencatatan/{id}', 'C_DataPencatatan@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');