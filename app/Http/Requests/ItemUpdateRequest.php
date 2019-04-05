<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'brand_id'=>'integer',
            'item_type_id'=>'integer',
            'name'=>'required|regex:/^([A-Za-z]+[A-Za-z0-9]*)$/', // nombres validos => a,a1,ans2n2n3 invalidos 5,3d,_ds,dsd4_x4
            'cost'=>'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'expiration_date' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'brand_id.integer' => "El material debe tener una marca",
            'item_type_id.integer' => "El material debe tener una tipo",
            'name.required' => "El campo 'Material' es obligatorio",
            'name.regex' => "Caracteres permitidos 'A-Za-z0-9' ejemplo: a,a3,A3a434s ",
            'cost.required' => "El campo 'Costo' es obligatorio",
            'cost.numeric' => "El campo 'Costo' debe ser numerico => ejemplo: 34.5, 34",
            'price.required' => "El campo 'Precio' es obligatorio",
            'price.numeric' => "El campo 'Precio' debe ser numerico => ejemplo: 34.5, 34",
            'quantity.required' => "El campo 'Cantidad' es obligatorio",
            'quantity.integer' => "El campo 'Cantidad' debe ser entero",
            'expiration_date.required' => "El campo 'Fecha caducidad' es obligatorio"
        ];
    }
}