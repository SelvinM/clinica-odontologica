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
Route::view('/perfil','profile')->name('profile');

Auth::routes(); 

//==================================================RUTAS DOCTOR================================================

//CRUD citas
Route::get('/d_citas', 'Doctor\AppointmentController@index')->name('doctor appointments');
Route::get('/d_citas/agregar','Doctor\AppointmentController@create')->name('doctor create appointment');
Route::get('/d_citas/editar/{appointment}','Doctor\AppointmentController@edit')->name('doctor edit appointment');

//CRUD articulos
Route::get('/d_articulos', 'Doctor\ItemController@index')->name('doctor items');
Route::get('/d_articulos/editar/{item}','Doctor\ItemController@edit')->name('doctor edit item');
Route::get('/d_articulos/agregar','Doctor\ItemController@create')->name('doctor create item');

//CRUD pacientes
Route::get('/d_pacientes', 'Doctor\PatientController@index')->name('doctor patients');
Route::get('/d_pacientes/editar/{patient}','Doctor\PatientController@edit')->name('doctor edit patient');
Route::get('/d_pacientes/agregar','Doctor\PatientController@create')->name('doctor create patient');
Route::view('/d_pacientes/apuntes','doctor.patient_notes')->name('doctor patient notes');

//CRUD historial paciente
Route::get('/d_pacientes/historial','Doctor\PatientLogController@index')->name('doctor patient logs');
Route::get('/d_pacientes/historial/editar/{patient_log}','Doctor\PatientLogController@edit')->name('doctor edit patient log');
Route::get('/d_pacientes/historial/agregar','Doctor\PatientLogController@create')->name('doctor create patient log');


 
//==================================================RUTAS ASISTENTE================================================

//CRUD citas
Route::get('/a_citas', 'Assistant\AppointmentController@index')->name('assistant appointments');
Route::get('/a_citas/agregar','Assistant\AppointmentController@create')->name('assistant create appointment');
Route::get('/a_citas/editar/{appointment}','Assistant\AppointmentController@edit')->name('assistant edit appointment');

//CRUD pacientes
Route::get('/a_pacientes', 'Assistant\PatientController@index')->name('assistant patients');
Route::get('/a_pacientes/agregar','Assistant\PatientController@create')->name('assistant create patient');
Route::get('/a_pacientes/editar/{patient}','Assistant\PatientController@edit')->name('assistant edit patient');
Route::view('/a_pacientes/apuntes','assistant.patient_notes')->name('assistant patient notes');
Route::put('/a_pacientes/actualizar/{patient}','Assistant\PatientController@update')->name('assistant update patient');
Route::post('/a_pacientes/guardar','Assistant\PatientController@store')->name('assistant store patient');
Route::delete('/a_pacientes/eliminar/{patient}','Assistant\PatientController@destroy')->name('assistant destroy patient');

//CRUD historial paciente
Route::get('/a_pacientes/historial','Assistant\PatientLogController@index')->name('assistant patient logs');
Route::get('/a_pacientes/historial/agregar','Assistant\PatientLogController@create')->name('assistant create patient log');
Route::get('/a_pacientes/historial/editar/{patient_log}','Assistant\PatientLogController@edit')->name('assistant edit patient log');

//CRUD articulos
Route::get('/a_articulos', 'Assistant\ItemController@index')->name('assistant items');
Route::get('/a_articulos/editar/{item}','Assistant\ItemController@edit')->name('assistant edit item');
Route::get('/a_articulos/agregar','Assistant\ItemController@create')->name('assistant create item');
Route::post('/a_articulos/guardar','Assistant\ItemController@store')->name('assistant store item');
Route::put('/a_articulos/actualizar/{item}','Assistant\ItemController@update')->name('assistant update item');
Route::delete('/a_articulos/eliminar/{item}','Assistant\ItemController@destroy')->name('assistant destroy item');


//==================================================RUTAS ADMIN================================================

//CRUD usuarios
Route::get('/ad_usuarios','Admin\UserController@index')->name('admin users');
Route::resource('usuarios','Admin\UserController');

//CRUD tipos de procedimiento
Route::get('/ad_tipos_procedimiento','Admin\ProcedureTypeController@index')->name('admin procedure types');
Route::get('/ad_tipos_procedimiento/agregar','Admin\ProcedureController@create')->name('admin create procedure type');
Route::get('/ad_tipos_procedimiento/editar/{procedure}','Admin\ProcedureController@edit')->name('admin edit procedure type');

//CRUD metodos de pago
Route::get('/ad_metodos_pagos','Admin\PaymentMethodController@index')->name('admin payment methods');
Route::get('/ad_metodos_pago/agregar','Admin\PaymentMethodController@create')->name('admin create payment method');
Route::get('/ad_metodos_pago/editar/{payment}','Admin\PaymentMethodController@edit')->name('admin edit payment method');
Route::get('/ad_metodos_pago/guardar', 'Admin\PaymentMethodController@store')->name('admin store payment method');
Route::put('/ad_metodos_pago/actualizar/{payment_method}', 'Admin\PaymentMethodController@update')->name('admin update payment method');
Route::delete('/ad_metodos_pago/eliminar/{payment_method}', 'Admin\PaymentMethodController@destroy')->name('admin destroy payment method');

//CRUD tipos de articulo
Route::get('/ad_tipos_articulo','Admin\ItemTypeController@index')->name('admin item types');
Route::get('/ad_tipos_articulo/agregar','Admin\ItemTypeController@create')->name('admin create item type');
Route::get('/ad_tipos_articulo/editar/{material}','Admin\ItemTypeController@edit')->name('admin edit item type');
Route::get('/ad_tipos_articulo/guardar', 'Admin\ItemTypeController@store')->name('admin store item type');
Route::put('/ad_tipos_articulo/actualizar/{item_type}', 'Admin\ItemTypeController@update')->name('admin update item type');
Route::delete('/ad_tipos_articulo/eliminar/{item_type}', 'Admin\ItemTypeController@destroy')->name('admin destroy item type');

//CRUD tipos de seguro
Route::get('/ad_tipos_seguro','Admin\InsuranceTypeController@index')->name('admin insurance types');
Route::get('/ad_tipos_seguro/agregar','Admin\InsuranceTypeController@create')->name('admin create insurance type');
Route::post('/ad_tipos_seguro/guardar','Admin\InsuranceTypeController@store')->name('admin store insurance type');
Route::get('/ad_tipos_seguro/editar/{insurance_type}','Admin\InsuranceTypeController@edit')->name('admin edit insurance type');
Route::put('/ad_tipos_seguro/actualizar/{insurance_type}','Admin\InsuranceTypeController@update')->name('admin update insurance type');
Route::delete('/ad_tipos_seguro/eliminar/{insurance_type}','Admin\InsuranceTypeController@destroy')->name('admin destroy insurance type');

