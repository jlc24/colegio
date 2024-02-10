<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorarioStoreRequest extends FormRequest
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
            'dia_semana' => ['required', 'date'],
            'hora_inicio' => ['required'],
            'hora_fin' => ['required'],
            'ca_id' => ['required', 'integer', 'exists:cas,id'],
            'pa_id' => ['required', 'integer', 'exists:pas,id'],
            'gestion' => ['required', 'string', 'max:10'],
            'estado' => ['required', 'integer'],
            'curso_aula_id' => ['required', 'integer', 'exists:curso_aulas,id'],
            'profesor_asignatura_id' => ['required', 'integer', 'exists:profesor_asignaturas,id'],
        ];
    }
}
