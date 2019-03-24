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
Route::get('/historial-paciente','PatientLogController@index')->name('patient logs');
Route::get('/usuarios', 'UserController@index')->name('users');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/editar-usuario/{user}','UserController@edit')->name('edit user');
Route::get('/editar-cita/{appointment}','AppointmentController@edit')->name('edit appointment');
Route::get('/editar-paciente/{patient}','PatientController@edit')->name('edit patient');
Route::get('/agregar-historial-paciente/{patient_log}','PatientLogController@edit')->name('edit patient log');
Route::get('/editar-objeto/{item}','ItemController@edit')->name('edit item');

Route::get('/agregar-usuario','UserController@create')->name('create user');
Route::get('/agregar-cita','AppointmentController@create')->name('create appointment');
Route::get('/agregar-paciente','PatientController@create')->name('create patient');
Route::get('/agregar-historial-paciente','PatientLogController@create')->name('create patient log');
Route::get('/agregar-objeto','ItemController@create')->name('create item');

Route::view('/apuntes-paciente','doctor.patient_notes')->name('patient notes');
Route::view('/perfil','doctor.profile')->name('profile');
 