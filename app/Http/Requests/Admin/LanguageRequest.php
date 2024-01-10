<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class LanguageRequest extends FormRequest
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
        'name' => 'required|string|max:255',
        'label' => 'required|string|max:255',
      ];
    }

    public function messages()
    {
    return [
        'name.required' => 'El nombre del idioma es obligatorio',
        'name.string' => 'El nombre del idioma debe ser una cadena de texto',
        'name.max' => 'El nombre del idioma no puede contener más de 255 caracteres',
        'label.required' => 'La etiqueta del idioma es obligatorio',
        'label.string' => 'La etiqueta del idioma debe ser una cadena de texto',
        'label.max' => 'La etiqueta del idioma no puede contener más de 255 caracteres',
        ];
    }
}