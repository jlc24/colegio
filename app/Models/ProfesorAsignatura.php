<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesorAsignatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'profesor_id',
        'asignatura_id',
        'gestion',
    ];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
