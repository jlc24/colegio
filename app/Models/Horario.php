<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'ca_id',
        'pa_id',
        'gestion',
        'estado'
    ];

    public function cursoAula()
    {
        return $this->belongsTo(CursoAula::class);
    }

    public function profesorAsignatura()
    {
        return $this->belongsTo(ProfesorAsignatura::class);
    }
}
