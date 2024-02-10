<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asignatura;
use App\Models\Profesor;

class AsignaturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asignatura::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'profesor_id' => Profesor::factory(),
            'estado' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
