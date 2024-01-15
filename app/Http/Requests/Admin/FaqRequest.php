<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class FaqRequest extends FormRequest
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
      ];
    }

    public function messages()
    {
    return [
        'name.required' => 'El título es obligatorio',
        'name.string' => 'El título debe ser una cadena de texto',
        'name.max' => 'El título no puede contener más de 255 caracteres',
        ];
    }
}