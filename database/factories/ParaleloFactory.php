<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Paralelo;

class ParaleloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paralelo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'paralelo' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'estado' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
