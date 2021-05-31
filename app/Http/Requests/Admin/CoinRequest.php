<?php

/*
|--------------------------------------------------------------------------
| Validaciones del formulario de la sección FAQ's
|--------------------------------------------------------------------------
|
| **authorize: determina si el usuario debe estar autorizado para enviar el formulario. 
|
| **rules: recoge las normas que se deben cumplir para validar el formulario. Los errores son 
|   devueltos en forma de objeto JSON en un error 422.
| 
| **messages: mensajes personalizados de error.
|    
*/

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CoinRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_coin' => 'required',
            'symbol' => 'required',
            'price' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name_coin.required' => 'El Nombre es obligatorio',
            'symbol.required' => 'El symbol es obligatorio',
            'price.required' => 'El precio es obligatorio',

        ];
    }
}
