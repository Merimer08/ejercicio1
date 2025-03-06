<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; /* autorizar la petición */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nombre"=> "required|string|max:255",
            "apellido"=> "required|string|max:255", 
            "email"=> "required|email|unique:alumnos",
            "telefono"=> "nullable|string|max:15", // Permitir que teléfono sea nulo o un valor válido    
            "edad"=> "required|integer|min:1", // Validación de edad'=> ',
            "direccion"=> "required|string|max:255", // Validación de dirección     
        ];
    }
}
