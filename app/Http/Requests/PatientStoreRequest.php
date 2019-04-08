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
        return [
            'insurance_type_id'=>'integer',
            'gender_id'=>'integer',
            'blood_type_id'=>'integer',
            'name'=>'max:45', // nombres validos => a,a1,ans2n2n3 invalidos 5,3d,_ds,dsd4_x4
            'email'=>'required|unique:users,email',
            'phone' => 'required|numeric'
        ];
    }


    public function messages()
    {
        return [
            'insurance_type_id.integer' => "El paciente debe tener un tipo de seguro",
            'gender_id.integer' => "El paciente debe tener uu genero",
            'description.required' => "El campo 'Descripcion' es obligatorio",
            'blood_type_id.integer' => "El paciente debe tener un tipo de sangre",
            'name.required' => "El campo 'Nombre' es obligatorio",
            'name.regex' => "Caracteres permitidos 'A-Za-z0-9' ejemplo: a,a3,A3a434s ",
            'email.required' => "El campo 'Correo' es obligatorio",
            'email.unique' => 'Este correo ya esta en uso',
            'phone.required' => "El campo 'Telefono' es obligatorio",
            'phone.numeric' => "El campo 'Telefono' debe ser numerico => ejemplo: 84848593,0191928331"
        ];
    }
}