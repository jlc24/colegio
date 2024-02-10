<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo',
        'nombre',
        'estado',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function estudianteCursos(): HasMany
    {
        return $this->hasMany(EstudianteCurso::class);
    }

    public function cursoAulas(): HasMany
    {
        return $this->hasMany(CursoAula::class);
    }

    public function cursoNivels(): HasMany
    {
        return $this->hasMany(CursoNivel::class);
    }

    public function cursoParalelos(): HasMany
    {
        return $this->hasMany(CursoParalelo::class);
    }
}
