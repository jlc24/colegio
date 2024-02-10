<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci',
        'nombres',
        'apellidos',
        'direccion',
        'fec_nac',
        'genero',
        'email',
        'telefono',
        'estado',
    ];

    public function estudianteCursos()
    {
        return $this->hasMany(EstudianteCurso::class);
    }
}
