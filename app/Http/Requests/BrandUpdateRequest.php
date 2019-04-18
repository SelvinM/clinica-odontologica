<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
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
            'name'=>'required|unique:brands,name,'.$this->brand->id.',id,deleted_at,NULL',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "El campo 'Marca' es obligatorio",
            'name.unique' => "Esta marca ya existe"
        ];
    }
}

