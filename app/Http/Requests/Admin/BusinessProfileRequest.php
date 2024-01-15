<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class BusinessProfileRequest extends FormRequest
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

    public function rules()
    {
      return [
        'comercial_name' => 'required|string|max:255',
        'email' => 'required','email','max:255',
      ];
    }

    public function messages()
    {
    return [
        'comercial_name.required' => 'El nombre es obligatorio',
        'comercial_name.string' => 'El nombre debe ser una cadena de texto',
        'comercial_name.max' => 'El nombre no puede contener más de 255 caracteres',
        'email.required' => 'El email es obligatorio',
        'email.email' => 'El formato de email es incorrecto',
        'email.max' => 'El máximo de caracteres permitidos para el email son 255',
        ];
    }
}