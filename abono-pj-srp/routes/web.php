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

Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('login','Auth\LoginController@login')->name('login');
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::post('validateDNI','LoginUserController@validateDNI');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'Dashboard@index')->name('dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ingreso_usuario', 'LoginUserController@index')->name('ingreso_usuario');
Route::get('/registro_usuario', 'RegistroUsuarioController@index')->name('registro_usuario');
Route::get('/registro_abono', 'RegistroAbonoController@index')->name('registro_abono');

//Ajax routing
Route::post('validateDNI', 'LoginUserController@validateDNI');
Route::post('validatePassword', 'LoginPasswordController@validatePassword');
Route::post('registrarUsuario', 'RegistroUsuarioController@registrarUsuario');
Route::post('obtenerIntendente', 'RegistroAbonoController@obtenerIntendente');
Route::post('registrarAbono', 'RegistroAbonoController@registrarAbono');
