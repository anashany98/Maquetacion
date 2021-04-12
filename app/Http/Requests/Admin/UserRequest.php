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

class FaqRequest extends FormRequest
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
            'password'=> 'required|alpha_num',
            'password_confirmation'=> 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El usuario es obligatorio',
            'email.required' => 'El email es obligatorio',
            'password.required' => 'Debe añadir una contraseña',
            'password_confirmation.required' => 'La contraseña no coincide',

        ];
    }
}
