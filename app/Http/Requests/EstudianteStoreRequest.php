<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'ci' => ['required', 'string', 'max:50'],
            'nombres' => ['required', 'string', 'max:150'],
            'apellidos' => ['required', 'string', 'max:150'],
            'direccion' => ['required', 'string', 'max:255'],
            'fec_nac' => ['required', 'date'],
            'genero' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'telefono' => ['required', 'string', 'max:20'],
            'estado' => ['required', 'integer'],
        ];
    }
}
