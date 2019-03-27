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
 
//rutas asistente

Route::get('/a_inicio', 'Assistant\HomeController@index')->name('home a');
Route::get('/a_citas', 'Assistant\AppointmentController@index')->name('appointments a');
Route::get('/a_inventario', 'Assistant\ItemController@index')->name('items a');
Route::get('/a_pacientes', 'Assistant\PatientController@index')->name('patients a');
Route::get('/a_historial-paciente','Assistant\PatientLogController@index')->name('patient logs a');
Route::get('/a_logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout a');

Route::get('/a_editar-cita/{appointment}','Assistant\AppointmentController@edit')->name('edit appointment a');
Route::get('/a_editar-paciente/{patient}','Assistant\PatientController@edit')->name('edit patient a');
Route::get('/a_agregar-historial-paciente/{patient_log}','Assistant\PatientLogController@edit')->name('edit patient log a');
Route::get('/a_editar-objeto/{item}','Assistant\ItemController@edit')->name('edit item a');

Route::get('/a_agregar-cita','Assistant\AppointmentController@create')->name('create appointment a');
Route::get('/a_agregar-paciente','Assistant\PatientController@create')->name('create patient a');
Route::get('/a_agregar-historial-paciente','Assistant\PatientLogController@create')->name('create patient log a');
Route::get('/a_agregar-objeto','Assistant\ItemController@create')->name('create item a');

Route::view('/a_apuntes-paciente','assistant.patient_notes')->name('patient notes a');
Route::view('/a_perfil','assistant.profile')->name('profile a');