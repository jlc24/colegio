<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\EstudianteCurso;

class EstudianteCursoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EstudianteCurso::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'estudiante_id' => Estudiante::factory(),
            'curso_id' => Curso::factory(),
            'gestion' => $this->faker->regexify('[A-Za-z0-9]{10}'),
        ];
    }
}
