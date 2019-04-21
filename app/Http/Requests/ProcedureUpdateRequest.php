<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcedureUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'procedure_type_id'=>'integer',
            'appointment_id'=>'integer',
            'price'=>'required|numeric',
        ];
    }


    public function messages()
    {
        return [
            'procedure_type_id.integer' => "El procedimiento debe tener un tipo",
            'appointment_id.integer' => "El procedimiento debe tener una cita asignada",
            'price.required' => "El campo 'Precio' es obligatorio",
            'price.numeric' => "El campo 'Precio' debe ser numerico => ejemplo: 34.50, 34",
        ];
    }
}