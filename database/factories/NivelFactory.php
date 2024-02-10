<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Nivel;

class NivelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nivel::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nivel' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'estado' => $this->faker->numberBetween(0, 1),
        ];
    }
}
