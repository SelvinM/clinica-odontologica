<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcedureTypeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:procedure_types,name,'.$this->procedure_type->id.',id,deleted_at,NULL',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "El campo 'Tipo de procedimiento' es obligatorio",
            'name.unique' => "Este tipo de procedimiento ya existe"
        ];
    }
}

