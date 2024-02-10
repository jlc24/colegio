<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asignatura extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'profesor_id',
        'estado',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'profesor_id' => 'integer',
    ];

    public function profesorAsignaturas(): HasMany
    {
        return $this->hasMany(ProfesorAsignatura::class);
    }

    public function profesor(): BelongsTo
    {
        return $this->belongsTo(Profesor::class);
    }
}
