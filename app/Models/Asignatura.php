<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'profesor_id',
        'estado',
    ];

    public function profesorAsignaturas()
    {
        return $this->hasMany(ProfesorAsignatura::class);
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }
}
