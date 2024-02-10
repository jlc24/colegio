<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\Curso;
use App\Models\CursoNivel;

class CursoNivelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CursoNivel::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'curso_id' => Curso::factory(),
            'nivel_id' => ::factory(),
            'gestion' => $this->faker->regexify('[A-Za-z0-9]{10}'),
        ];
    }
}
