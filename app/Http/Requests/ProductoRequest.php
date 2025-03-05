<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'codigo' => 'required|min:3|max:64',
            'nombre' => 'required|min:3|max:100',
            'precio_venta' => 'required|numeric',
            'categoria_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return  [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
            'codigo.required' => 'El código es obligatorio.',
            'codigo.min' => 'El código debe tener al menos 3 caracteres.',
            'codigo.max' => 'El código no puede tener más de 64 caracteres.',
            'precio_venta.required' => 'El precio de venta es obligatorio.',
            'precio_venta.numeric' => 'El previo de venta debe ser un número.',
            'categoria_id.required' => 'La categoría es obligatorio.',
            'categoria_id.numeric' => 'La categoría debe ser un número.'
        ];
    }
}
