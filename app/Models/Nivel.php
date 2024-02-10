<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nivel',
        'estado',
    ];

    public function cursoNivels()
    {
        return $this->hasMany(CursoNivel::class);
    }
}
