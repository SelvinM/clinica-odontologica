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

Auth::routes();

Route::get('/inicio', 'HomeController@index')->name('home');
Route::get('/citas', 'AppointmentController@index')->name('appointments');
Route::get('/inventario', 'ItemController@index')->name('items');
Route::get('/pacientes', 'PatientController@index')->name('patients');
Route::get('/usuarios', 'UserController@index')->name('users');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/editar-usuario/{user}','UserController@edit')->name('edit user');
Route::get('/editar-cita/{appointment}','UserController@edit')->name('edit appointment');
Route::get('/editar-paciente/{patient}','UserController@edit')->name('edit patient');
Route::get('/editar-objeto/{item}','UserController@edit')->name('edit item');

Route::get('/agregar-usuario','UserController@create')->name('create user');
Route::get('/agregar-cita','UserController@create')->name('create appointment');
Route::get('/agregar-paciente','UserController@create')->name('create patient');
Route::get('/agregar-objeto','UserController@create')->name('create item');

