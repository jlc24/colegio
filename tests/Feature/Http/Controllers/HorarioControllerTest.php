<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Ca;
use App\Models\CursoAula;
use App\Models\Horario;
use App\Models\Pa;
use App\Models\ProfesorAsignatura;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HorarioController
 */
final class HorarioControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $horarios = Horario::factory()->count(3)->create();

        $response = $this->get(route('horario.index'));

        $response->assertOk();
        $response->assertViewIs('horario.index');
        $response->assertViewHas('horarios');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('horario.create'));

        $response->assertOk();
        $response->assertViewIs('horario.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HorarioController::class,
            'store',
            \App\Http\Requests\HorarioStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $dia_semana = $this->faker->date();
        $hora_inicio = $this->faker->time();
        $hora_fin = $this->faker->time();
        $ca = Ca::factory()->create();
        $pa = Pa::factory()->create();
        $gestion = $this->faker->word();
        $estado = $this->faker->numberBetween(-10000, 10000);
        $curso_aula = CursoAula::factory()->create();
        $profesor_asignatura = ProfesorAsignatura::factory()->create();

        $response = $this->post(route('horario.store'), [
            'dia_semana' => $dia_semana,
            'hora_inicio' => $hora_inicio,
            'hora_fin' => $hora_fin,
            'ca_id' => $ca->id,
            'pa_id' => $pa->id,
            'gestion' => $gestion,
            'estado' => $estado,
            'curso_aula_id' => $curso_aula->id,
            'profesor_asignatura_id' => $profesor_asignatura->id,
        ]);

        $horarios = Horario::query()
            ->where('dia_semana', $dia_semana)
            ->where('hora_inicio', $hora_inicio)
            ->where('hora_fin', $hora_fin)
            ->where('ca_id', $ca->id)
            ->where('pa_id', $pa->id)
            ->where('gestion', $gestion)
            ->where('estado', $estado)
            ->where('curso_aula_id', $curso_aula->id)
            ->where('profesor_asignatura_id', $profesor_asignatura->id)
            ->get();
        $this->assertCount(1, $horarios);
        $horario = $horarios->first();

        $response->assertRedirect(route('horario.index'));
        $response->assertSessionHas('horario.id', $horario->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $horario = Horario::factory()->create();

        $response = $this->get(route('horario.show', $horario));

        $response->assertOk();
        $response->assertViewIs('horario.show');
        $response->assertViewHas('horario');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $horario = Horario::factory()->create();

        $response = $this->get(route('horario.edit', $horario));

        $response->assertOk();
        $response->assertViewIs('horario.edit');
        $response->assertViewHas('horario');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HorarioController::class,
            'update',
            \App\Http\Requests\HorarioUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $horario = Horario::factory()->create();
        $dia_semana = $this->faker->date();
        $hora_inicio = $this->faker->time();
        $hora_fin = $this->faker->time();
        $ca = Ca::factory()->create();
        $pa = Pa::factory()->create();
        $gestion = $this->faker->word();
        $estado = $this->faker->numberBetween(-10000, 10000);
        $curso_aula = CursoAula::factory()->create();
        $profesor_asignatura = ProfesorAsignatura::factory()->create();

        $response = $this->put(route('horario.update', $horario), [
            'dia_semana' => $dia_semana,
            'hora_inicio' => $hora_inicio,
            'hora_fin' => $hora_fin,
            'ca_id' => $ca->id,
            'pa_id' => $pa->id,
            'gestion' => $gestion,
            'estado' => $estado,
            'curso_aula_id' => $curso_aula->id,
            'profesor_asignatura_id' => $profesor_asignatura->id,
        ]);

        $horario->refresh();

        $response->assertRedirect(route('horario.index'));
        $response->assertSessionHas('horario.id', $horario->id);

        $this->assertEquals(Carbon::parse($dia_semana), $horario->dia_semana);
        $this->assertEquals($hora_inicio, $horario->hora_inicio);
        $this->assertEquals($hora_fin, $horario->hora_fin);
        $this->assertEquals($ca->id, $horario->ca_id);
        $this->assertEquals($pa->id, $horario->pa_id);
        $this->assertEquals($gestion, $horario->gestion);
        $this->assertEquals($estado, $horario->estado);
        $this->assertEquals($curso_aula->id, $horario->curso_aula_id);
        $this->assertEquals($profesor_asignatura->id, $horario->profesor_asignatura_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $horario = Horario::factory()->create();

        $response = $this->delete(route('horario.destroy', $horario));

        $response->assertRedirect(route('horario.index'));

        $this->assertModelMissing($horario);
    }
}
