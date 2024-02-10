<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Ca;
use App\Models\CursoAula;
use App\Models\Horario;
use App\Models\Pa;
use App\Models\ProfesorAsignatura;

class HorarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Horario::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'dia_semana' => $this->faker->date(),
            'hora_inicio' => $this->faker->time(),
            'hora_fin' => $this->faker->time(),
            'ca_id' => Ca::factory(),
            'pa_id' => Pa::factory(),
            'gestion' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'estado' => $this->faker->numberBetween(-10000, 10000),
            'curso_aula_id' => CursoAula::factory(),
            'profesor_asignatura_id' => ProfesorAsignatura::factory(),
        ];
    }
}
