<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Horario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'ca_id',
        'pa_id',
        'gestion',
        'estado',
        'curso_aula_id',
        'profesor_asignatura_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dia_semana' => 'date',
        'ca_id' => 'integer',
        'pa_id' => 'integer',
        'curso_aula_id' => 'integer',
        'profesor_asignatura_id' => 'integer',
    ];

    public function cursoAula(): BelongsTo
    {
        return $this->belongsTo(CursoAula::class);
    }

    public function profesorAsignatura(): BelongsTo
    {
        return $this->belongsTo(ProfesorAsignatura::class);
    }

    public function ca(): BelongsTo
    {
        return $this->belongsTo(Ca::class);
    }

    public function pa(): BelongsTo
    {
        return $this->belongsTo(Pa::class);
    }
}
