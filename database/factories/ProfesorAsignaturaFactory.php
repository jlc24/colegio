<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asignatura;
use App\Models\Profesor;
use App\Models\ProfesorAsignatura;

class ProfesorAsignaturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfesorAsignatura::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'profesor_id' => Profesor::factory(),
            'asignatura_id' => Asignatura::factory(),
            'gestion' => $this->faker->regexify('[A-Za-z0-9]{10}'),
        ];
    }
}
