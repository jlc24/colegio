<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Paralelo;
use App\Models\Curso;
use App\Models\CursoParalelo;

class CursoParaleloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CursoParalelo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'curso_id' => Curso::factory(),
            'paralelo_id' => Paralelo::factory(),
            'gestion' => $this->faker->regexify('[A-Za-z0-9]{10}'),
        ];
    }
}
