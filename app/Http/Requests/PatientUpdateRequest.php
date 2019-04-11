<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'insurance_type_id'=>'required|integer',
            'gender_id'=>'required|integer',
            'blood_type_id'=>'required|integer',
            'name'=>'required|max:8000', 
            'description'=>'required|max:45',
            'home_address'=>'required|max:45',
            'email'=>'required',
            'birthdate'=>'required',
            'phone' => 'required|numeric'
        ];
    }


    public function messages()
    {
        return [
            'insurance_type_id.required' => "El paciente debe tener un tipo de seguro",
            'insurance_type_id.integer' => "El paciente debe tener un tipo de seguro",
            'gender_id.required' => "El paciente debe tener un genero",
            'gender_id.integer' => "El paciente debe tener un genero",
            'description.required' => "El campo 'Descripcion' es obligatorio",
            'blood_type_id.required' => "El paciente debe tener un tipo de sangre",
            'blood_type_id.integer' => "El paciente debe tener un tipo de sangre",
            'name.required' => "El campo 'Nombre' es obligatorio",
            'home_address.required' => "El campo 'Nombre' es obligatorio",
            'email.required' => "El campo 'Correo' es obligatorio",
            'phone.required' => "El campo 'Telefono' es obligatorio",
            'birthdate.required' => "El campo 'Fecha de nacimiento' es obligatorio",
            'phone.numeric' => "El campo 'Telefono' debe ser numerico => ejemplo: 84848593,0191928331"
        ];
    }
}