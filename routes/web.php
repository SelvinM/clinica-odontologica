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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/inicio', 'HomeController@index')->name('home');
Auth::routes(); 

//rutas doctor


Route::get('/citas', 'Doctor\AppointmentController@index')->name('doctor appointments');
Route::get('/inventario', 'Doctor\ItemController@index')->name('doctor items');
Route::get('/pacientes', 'Doctor\PatientController@index')->name('doctor patients');
Route::get('/historial-paciente','Doctor\PatientLogController@index')->name('doctor patient logs');
Route::get('/usuarios', 'Doctor\UserController@index')->name('doctor users');

Route::get('/editar-usuario/{user}','Doctor\UserController@edit')->name('doctor edit user');
Route::get('/editar-cita/{appointment}','Doctor\AppointmentController@edit')->name('doctor edit appointment');
Route::get('/editar-paciente/{patient}','Doctor\PatientController@edit')->name('doctor edit patient');
Route::get('/agregar-historial-paciente/{patient_log}','Doctor\PatientLogController@edit')->name('doctor edit patient log');
Route::get('/editar-objeto/{item}','Doctor\ItemController@edit')->name('doctor edit item');

Route::get('/agregar-usuario','Doctor\UserController@create')->name('doctor create user');
Route::get('/agregar-cita','Doctor\AppointmentController@create')->name('doctor create appointment');
Route::get('/agregar-paciente','Doctor\PatientController@create')->name('doctor create patient');
Route::get('/agregar-historial-paciente','Doctor\PatientLogController@create')->name('doctor create patient log');
Route::get('/agregar-objeto','Doctor\ItemController@create')->name('doctor create item');

Route::view('/apuntes-paciente','doctor.patient_notes')->name('doctor patient notes');
Route::view('/perfil','doctor.profile')->name('doctor profile');
 
//rutas asistente

Route::get('/a_citas', 'Assistant\AppointmentController@index')->name('assistant appointments');
Route::get('/a_inventario', 'Assistant\ItemController@index')->name('assistant items');
Route::get('/a_pacientes', 'Assistant\PatientController@index')->name('assistant patients');
Route::get('/a_historial-paciente','Assistant\PatientLogController@index')->name('assistant patient logs');

Route::get('/a_editar-cita/{appointment}','Assistant\AppointmentController@edit')->name('assistant edit appointment');
Route::get('/a_editar-paciente/{patient}','Assistant\PatientController@edit')->name('assistant edit patient');
Route::get('/a_agregar-historial-paciente/{patient_log}','Assistant\PatientLogController@edit')->name('assistant edit patient log');
Route::get('/a_editar-objeto/{item}','Assistant\ItemController@edit')->name('assistant edit item');

Route::get('/a_agregar-cita','Assistant\AppointmentController@create')->name('assistant create appointment');
Route::get('/a_agregar-paciente','Assistant\PatientController@create')->name('assistant create patient');
Route::get('/a_agregar-historial-paciente','Assistant\PatientLogController@create')->name('assistant create patient log');
Route::get('/a_agregar-objeto','Assistant\ItemController@create')->name('assistant create item');

Route::view('/a_apuntes-paciente','assistant.patient_notes')->name('assistant patient notes');
Route::view('/a_perfil','assistant.profile')->name('assistant profile');

//rutas admin
