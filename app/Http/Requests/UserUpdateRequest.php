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
        ];
         return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => "El campo 'Nombre' es obligatorio",
            'email.required' => "El campo 'Correo' es obligatorio". $this->tag,
            'email.unique' => 'Este correo ya esta en uso',
        ];
    }
}