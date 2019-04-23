<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ImageStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image'=>'required|image|mimes:jpeg,bmp,jpg,png|max:4096', //maximo de las fotos 4 MB
            'description'=>'max:300'
        ];
    }


    public function messages()
    {
        return [
            'image.required'=>"La foto es obligatoria",
            'image.max'=>"La foto no debe tener mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
            'image.image'=>"La foto no debe tener un peso mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
            'image.mimes'=>"La foto no debe tener un peso mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
            'description.max'=>"Caracteres maximos permitidos 300"
        ];
    }
}