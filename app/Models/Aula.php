<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'capacidad',
        'ubicacion',
        'estado',
    ];

    public function cursoAulas()
    {
        return $this->hasMany(CursoAula::class);
    }
}
