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
Route::get('/historialpaciente','Doctor\PatientLogController@index')->name('doctor patient logs');

Route::get('/cita/editar/{appointment}','Doctor\AppointmentController@edit')->name('doctor edit appointment');
Route::get('/paciente/editar/{patient}','Doctor\PatientController@edit')->name('doctor edit patient');
Route::get('/historialpaciente/editar/{patient_log}','Doctor\PatientLogController@edit')->name('doctor edit patient log');
Route::get('/objeto/editar/{item}','Doctor\ItemController@edit')->name('doctor edit item');

Route::get('/cita/agregar','Doctor\AppointmentController@create')->name('doctor create appointment');
Route::view('/pacientes/agregar','doctor.create_patient_2')->name('doctor create patient 2');
Route::get('/paciente/agregar','Doctor\PatientController@create')->name('doctor create patient');
Route::get('/historial-paciente/agregar','Doctor\PatientLogController@create')->name('doctor create patient log');

Route::get('/objeto/agregar','Doctor\ItemController@create')->name('doctor create item');

Route::view('/apuntes-paciente','doctor.patient_notes')->name('doctor patient notes');
Route::view('/perfil','doctor.profile')->name('doctor profile');
 
//rutas asistente

Route::get('/a_citas', 'Assistant\AppointmentController@index')->name('assistant appointments');
Route::get('/a_inventario', 'Assistant\ItemController@index')->name('assistant items');
Route::get('/a_pacientes', 'Assistant\PatientController@index')->name('assistant patients');
Route::get('/a_historial-paciente','Assistant\PatientLogController@index')->name('assistant patient logs');

Route::get('/a_cita/editar/{appointment}','Assistant\AppointmentController@edit')->name('assistant edit appointment');
Route::get('/a_paciente/editar/{patient}','Assistant\PatientController@edit')->name('assistant edit patient');
Route::get('/a_historialpaciente/editar/{patient_log}','Assistant\PatientLogController@edit')->name('assistant edit patient log');
Route::get('/a_objeto/editar/{item}','Assistant\ItemController@edit')->name('assistant edit item');

Route::get('/a_cita/agregar','Assistant\AppointmentController@create')->name('assistant create appointment');
Route::get('/a_pacientes/agregar','Assistant\PatientController@create')->name('assistant create patient');
Route::view('/a_paciente/agregar','assistant.create_patient_2')->name('assistant create patient 2');
Route::get('/a_historialpaciente/agregar','Assistant\PatientLogController@create')->name('assistant create patient log');
Route::get('/a_objeto/agregar','Assistant\ItemController@create')->name('assistant create item');

Route::view('/a_apuntespaciente','assistant.patient_notes')->name('assistant patient notes');
Route::view('/a_perfil','assistant.profile')->name('assistant profile');

//rutas admin
Route::get('/ad_usuarios','Admin\UserController@index')->name('admin users');
Route::get('/ad_procedimientos','Admin\ProcedureController@index')->name('admin procedures');
Route::get('/ad_pagos','Admin\PaymentController@index')->name('admin payments');
Route::get('/ad_materiales','Admin\MaterialController@index')->name('admin materials');

//Ruta para agregar tipos materiales desde el admin
Route::get('/ad_material/agregar','Admin\MaterialController@create')->name('admin create material');


//Ruta para agregar un tipo de pago desde el admin
Route::get('/ad_tipodepago/agregar','Admin\PaymentController@create')->name('admin create payment type');
//Ruta para agregar un tipo de seguro desde el admin
//Ruta para agregar un tipo de procedimiento desde el admin
Route::get('/ad_tipoprocedimiento/agregar','Admin\ProcedureController@create')->name('admin create procedure type');

//Ruta para editar materiales desde el admin
Route::get('/ad_material/editar/{material}','Admin\MaterialController@edit')->name('admin edit material');
//Ruta para editar un tipo de pago desde el admin
Route::get('/ad_tipopago/editar/{payment}','Admin\PaymentController@edit')->name('admin edit payment type');
//Ruta para editar un tipo de procedimiento desde el admin
Route::get('/ad_tipoprocedimiento/editar/{procedure}','Admin\ProcedureController@edit')->name('admin edit procedure type');

//Rutas para el CRUD de tipos de seguros desde el admin
Route::get('/ad_tiposseguros','Admin\InsuranceTypeController@index')->name('admin insurance types');
Route::get('/ad_tipodeseguro/agregar','Admin\InsuranceTypeController@create')->name('admin create insurance type');
Route::post('/ad_tiposeguro/guardar','Admin\InsuranceTypeController@store')->name('admin store insurance type');
Route::get('/ad_tipodeseguro/editar/{insurance_type}','Admin\InsuranceTypeController@edit')->name('admin edit insurance type');
Route::put('/ad_tiposeguro/update/{insurance_type}','Admin\InsuranceTypeController@update')->name('admin update insurance type');
Route::delete('/ad_tiposeguro/eliminar/{insurance_type}','Admin\InsuranceTypeController@destroy')->name('admin destroy insurance type');
 
//Rutas para el CRUD de items desde asistente
Route::post('/a_material/guardar','Assistant\ItemController@store')->name('assistant store item');
Route::put('/a_material/update/{item}','Assistant\ItemController@update')->name('assistant update item');
Route::delete('/a_material/eliminar/{item}','Assistant\ItemController@destroy')->name('assistant destroy item');

//Rutas para el CRUD de usuarios con resource
Route::resource('usuarios','Admin\UserController');


//Rutas CRUD tipos de materiales

// Guardado en la tabla tipo de materiales
Route::get('/ad_tiposdemateriales/guardar', 'Admin\MaterialController@store')->name('admin store material type');

// Fin CRUD tipos de materiales