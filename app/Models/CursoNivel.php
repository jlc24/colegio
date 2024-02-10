<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoNivel extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso_id',
        'nivel_id',
        'gestion',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }
}
