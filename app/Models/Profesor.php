<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci',
        'nombres',
        'apellidos',
        'direccion',
        'fec_nac',
        'especialidad',
        'email',
        'telefono',
        'estado',
    ];

    public function profesorAsignaturas()
    {
        return $this->hasMany(ProfesorAsignatura::class);
    }
}
