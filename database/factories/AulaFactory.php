<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Aula;

class AulaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aula::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'nombre' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'capacidad' => $this->faker->numberBetween(20, 40),
            'ubicacion' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'estado' => $this->faker->numberBetween(0, 1),
        ];
    }
}
