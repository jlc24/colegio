<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'estado',
    ];

    public function estudianteCursos()
    {
        return $this->hasMany(EstudianteCurso::class);
    }

    public function cursoAulas()
    {
        return $this->hasMany(CursoAula::class);
    }

    public function cursoNivels()
    {
        return $this->hasMany(CursoNivel::class);
    }

    public function cursoParalelos()
    {
        return $this->hasMany(CursoParalelo::class);
    }
}
