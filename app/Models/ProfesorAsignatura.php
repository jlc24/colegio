<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProfesorAsignatura extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profesor_id',
        'asignatura_id',
        'gestion',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'profesor_id' => 'integer',
        'asignatura_id' => 'integer',
    ];

    public function profesor(): BelongsTo
    {
        return $this->belongsTo(Profesor::class);
    }

    public function asignatura(): BelongsTo
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function horarios(): HasMany
    {
        return $this->hasMany(Horario::class);
    }
}
