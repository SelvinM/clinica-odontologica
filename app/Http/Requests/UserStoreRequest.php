<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required|same:password_confirmed',
            'role_id' => 'integer',
            'assigned_doctor_id' => 'required_if:role_id,==,3',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => "El campo 'Nombre' es obligatorio",
            'email.required' => "El campo 'Correo' es obligatorio". $this->tag,
            'email.unique' => 'Este correo ya esta en uso',
            'password.required' => "El campo 'Contraseña' es obligatorio",
            'role_id.integer' => 'El usuario debe tener un rol asignado',
            'assigned_doctor_id.required_if' => 'Los asistentes deben tener un doctor asignado',
            'password.same' => 'Las contraseñas no coinciden'
        ];
    }
}
