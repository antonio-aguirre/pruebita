<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategories extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // se cambia a verdadero para que se muestren los mensajitos
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|min:5',
            'descripcion' => 'required|string|min:0',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => "No a introducido un nombre a la categoría",
            'nombre.min' => "El nombre de la categoría debe ser mayor a cinco caracteres",

            'descripcion.required' => "Descripción de la categoría es obligatoria",
            'descripcion.min' => "Se debe de introducir la descripción de la categoría"
        ];
    }
}
