<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $today = now()->format('Y-m-d');
        return [
            'patient_id'=>'integer',
            'description'=>'max:300',
            'date'=>'required|after_or_equal:'.$today
        ];
    }


    public function messages()
    {
        return [
            'patient_id.integer'=>"Debe seleccionar un paciente",
            'description.max'=>"Caracteres maximos permitidos 300",
            'date.required'=>"El campo Fecha es obligatorio",
            'date.after_or_equal'=> "La fecha de la cita debe ser igual o posterior a la fecha actual"
        ];
    }
}