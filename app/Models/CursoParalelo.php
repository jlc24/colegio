<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoParalelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso_id',
        'paralelo_id',
        'gestion',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function paralelo()
    {
        return $this->belongsTo(Paralelo::class);
    }
}
