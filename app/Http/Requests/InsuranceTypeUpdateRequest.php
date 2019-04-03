<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceTypeUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|unique:insurance_types,name,'.$this->insurance_type,
        ];
    }


    public function messages()
    {
        return [
            'name.required' => "El campo 'Nombre' es obligatorio",
            'name.unique' => "El campo 'Nombre' debe de ser unico"
        ];
    }
}