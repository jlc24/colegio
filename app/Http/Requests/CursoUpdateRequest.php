<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoUpdateRequest extends FormRequest
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
            'codigo' => ['required', 'string', 'max:20'],
            'nombre' => ['required', 'string', 'max:50'],
            'estado' => ['required', 'integer'],
        ];
    }
}
