<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Estudiante;

class EstudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estudiante::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ci' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'nombres' => $this->faker->regexify('[A-Za-z0-9]{150}'),
            'apellidos' => $this->faker->regexify('[A-Za-z0-9]{150}'),
            'direccion' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'fec_nac' => $this->faker->date(),
            'genero' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'email' => $this->faker->safeEmail(),
            'telefono' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'estado' => $this->faker->numberBetween(0, 1),
        ];
    }
}
