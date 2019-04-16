<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $today = now()->format('Y-m-d');
        return [

            'gender_id'=>'required|integer',
            'blood_type_id'=>'required|integer',
            'name'=>'required|max:45', 
            'description'=>'required|max:8000',
            'home_address'=>'required|max:45',
            'email'=>'required',
            'birthdate'=>'required|before:'.$today,
            'phone' => 'required|numeric'
        ];
    }


    public function messages()
    {
        return [
            
            'gender_id.required' => "El paciente debe tener un genero",
            'gender_id.integer' => "El paciente debe tener un genero",
            'description.required' => "El campo 'Descripcion' es obligatorio",
            'description.max' => "El campo 'Descripcion' no debe contener mas de 8000 caracteres",
            'blood_type_id.required' => "El paciente debe tener un tipo de sangre",
            'blood_type_id.integer' => "El paciente debe tener un tipo de sangre",
            'name.required' => "El campo 'Nombre' es obligatorio",
            'name.max' => "El campo 'Nombre' no debe contener mas de 45 caracteres",
            'home_address.required' => "El campo 'Nombre' es obligatorio",
            'email.required' => "El campo 'Correo' es obligatorio",
            'phone.required' => "El campo 'Telefono' es obligatorio",
            'birthdate.required' => "El campo 'Fecha de nacimiento' es obligatorio",
            'birthdate.before' => "El campo 'Fecha de nacimiento' debe ser anterior a la fecha actual",
            'phone.numeric' => "El campo 'Telefono' debe ser numerico => ejemplo: 84848593,0191928331"
        ];
    }
}