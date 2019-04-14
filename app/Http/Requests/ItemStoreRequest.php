<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
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
            'name'=>'max:45|required|regex:/^([A-Za-z]+[A-Za-z0-9 ]*)$/', // nombres validos => a,a1,ans2n2n3 invalidos 5,3d,_ds,dsd4_x4
            'cost'=>'required|numeric',
            'quantity' => 'required|integer',
            'expiration_date' => 'required|after_or_equal:purchase_date',
            'batch' => 'required|alpha_num|max:12',
            'purchase_date' => 'required',
            'description' => 'max:500'
        ];
    }


    public function messages()
    {
        return [
            'brand_id.integer' => "El material debe tener una marca",
            'item_type_id.integer' => "El material debe tener una tipo",
            'name.max' => "Caracteres maximos permitidos 45",
            'name.required' => "El campo 'Material' es obligatorio",
            'name.regex' => "Caracteres permitidos 'A-Za-z0-9' ejemplo: a,a3,A3a434s, ajsdj sjd jd4j ",
            'cost.required' => "El campo 'Costo' es obligatorio",
            'cost.numeric' => "El campo 'Costo' debe ser numerico => ejemplo: 34.5, 34",
            'quantity.required' => "El campo 'Cantidad' es obligatorio",
            'quantity.integer' => "El campo 'Cantidad' debe ser entero",
            'expiration_date.required' => "El campo 'Fecha caducidad' es obligatorio",
            'expiration_date.after_or_equal' => "La fecha de expiración debe ser mayor o igual a la fecha de compra",
            'batch.required' => "El campo 'Lote' es obligatorio",
            'batch.alpha_num' => "valores solamente alfanumericos",
            'batch.max' => 'Caracteres maximos permitidos 12',
            'purchase_date.required' => "El campo 'Fecha compra' es obligatorio",
            'description.max' => 'Caracteres maximos permitidos 500'
        ];
    }
}
