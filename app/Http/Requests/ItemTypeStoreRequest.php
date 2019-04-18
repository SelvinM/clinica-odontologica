<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemTypeStoreRequest extends FormRequest
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
            'name'=>'required|unique:item_types,name,NULL,id,deleted_at,NULL'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => "El campo 'tipo de producto' es obligatorio",
            'name.unique' => "Este tipo de producto ya existe"
        ];
    }
}
