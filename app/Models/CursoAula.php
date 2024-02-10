<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoAula extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso_id',
        'aula_id',
        'gestion',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
