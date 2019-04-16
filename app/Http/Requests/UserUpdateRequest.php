<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $rules = [
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$this->usuario.',id,deleted_at,NULL',
            'role_id' => 'integer',
            'assigned_doctor_id' => 'required_if:role_id,==,3',
        ];
         return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => "El campo 'Nombre' es obligatorio",
            'email.required' => "El campo 'Correo' es obligatorio". $this->tag,
            'email.unique' => 'Este correo ya esta en uso',
            'role_id.integer' => 'El usuario debe tener un rol asignado',
            'assigned_doctor_id.required_if' => 'Los asistentes deben tener un doctor asignado',
        ];
    }
}