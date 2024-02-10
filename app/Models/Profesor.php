<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fec_nac' => 'date',
    ];

    public function profesorAsignaturas(): HasMany
    {
        return $this->hasMany(ProfesorAsignatura::class);
    }
}
