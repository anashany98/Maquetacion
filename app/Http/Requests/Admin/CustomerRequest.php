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

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'direction'=> 'required',
            'postal_code'=> 'required',
            'number'=> 'required| numeric',
            'country'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El usuario es obligatorio',
            'email.required' => 'El email es obligatorio',
            'direction.required' => 'Debe añadir una dirrecion',
            'postal_code.required' => 'El codigo postal es obligatoria',
            'number.required' => 'Debe añadir un numero de telefono de contacto',
            'country.required' => 'Debe añadir su pais',

        ];
    }
}
