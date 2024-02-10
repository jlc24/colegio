<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Profesor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AsignaturaController
 */
final class AsignaturaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $asignaturas = Asignatura::factory()->count(3)->create();

        $response = $this->get(route('asignatura.index'));

        $response->assertOk();
        $response->assertViewIs('asignatura.index');
        $response->assertViewHas('asignaturas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('asignatura.create'));

        $response->assertOk();
        $response->assertViewIs('asignatura.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AsignaturaController::class,
            'store',
            \App\Http\Requests\AsignaturaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $nombre = $this->faker->word();
        $profesor = Profesor::factory()->create();
        $estado = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('asignatura.store'), [
            'nombre' => $nombre,
            'profesor_id' => $profesor->id,
            'estado' => $estado,
        ]);

        $asignaturas = Asignatura::query()
            ->where('nombre', $nombre)
            ->where('profesor_id', $profesor->id)
            ->where('estado', $estado)
            ->get();
        $this->assertCount(1, $asignaturas);
        $asignatura = $asignaturas->first();

        $response->assertRedirect(route('asignatura.index'));
        $response->assertSessionHas('asignatura.id', $asignatura->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $asignatura = Asignatura::factory()->create();

        $response = $this->get(route('asignatura.show', $asignatura));

        $response->assertOk();
        $response->assertViewIs('asignatura.show');
        $response->assertViewHas('asignatura');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $asignatura = Asignatura::factory()->create();

        $response = $this->get(route('asignatura.edit', $asignatura));

        $response->assertOk();
        $response->assertViewIs('asignatura.edit');
        $response->assertViewHas('asignatura');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AsignaturaController::class,
            'update',
            \App\Http\Requests\AsignaturaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $asignatura = Asignatura::factory()->create();
        $nombre = $this->faker->word();
        $profesor = Profesor::factory()->create();
        $estado = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('asignatura.update', $asignatura), [
            'nombre' => $nombre,
            'profesor_id' => $profesor->id,
            'estado' => $estado,
        ]);

        $asignatura->refresh();

        $response->assertRedirect(route('asignatura.index'));
        $response->assertSessionHas('asignatura.id', $asignatura->id);

        $this->assertEquals($nombre, $asignatura->nombre);
        $this->assertEquals($profesor->id, $asignatura->profesor_id);
        $this->assertEquals($estado, $asignatura->estado);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $asignatura = Asignatura::factory()->create();

        $response = $this->delete(route('asignatura.destroy', $asignatura));

        $response->assertRedirect(route('asignatura.index'));

        $this->assertModelMissing($asignatura);
    }
}
