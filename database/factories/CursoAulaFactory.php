<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\Curso;
use App\Models\CursoAula;

class CursoAulaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CursoAula::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'curso_id' => Curso::factory(),
            'aula_id' => ::factory(),
            'gestion' => $this->faker->regexify('[A-Za-z0-9]{10}'),
        ];
    }
}
