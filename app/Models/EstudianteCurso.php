<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteCurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'curso_id',
        'gestion',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
