<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
    public function rules() // funcion para poner condiciones
    {
        return [
            'nombre' => 'required|string|min:5',
            'precio' => 'required|int|min:0',
            'descripcion' => 'required|string|min:0',
        ];
    }

    public function messages()
    {
      return [
        'nombre.required' => "El nombre del producto es obligatorio",
        'nombre.min' => "El nombre del producto debe ser mayor a cinco caracteres",

        'precio.required' => "El precio del producto es obligatorio",
        'precio.min' => "El precio debe ser mayor a 0",

        'descripcion.required' => "La descripción es obligatoria",
        'descripcion.min' => "Debe de poner una descripción",
      ];
    }
}
