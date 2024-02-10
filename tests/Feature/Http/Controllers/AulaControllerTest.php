<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Aula;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AulaController
 */
final class AulaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $aulas = Aula::factory()->count(3)->create();

        $response = $this->get(route('aula.index'));

        $response->assertOk();
        $response->assertViewIs('aula.index');
        $response->assertViewHas('aulas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('aula.create'));

        $response->assertOk();
        $response->assertViewIs('aula.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AulaController::class,
            'store',
            \App\Http\Requests\AulaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $codigo = $this->faker->word();
        $nombre = $this->faker->word();
        $capacidad = $this->faker->numberBetween(-10000, 10000);
        $ubicacion = $this->faker->word();
        $estado = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('aula.store'), [
            'codigo' => $codigo,
            'nombre' => $nombre,
            'capacidad' => $capacidad,
            'ubicacion' => $ubicacion,
            'estado' => $estado,
        ]);

        $aulas = Aula::query()
            ->where('codigo', $codigo)
            ->where('nombre', $nombre)
            ->where('capacidad', $capacidad)
            ->where('ubicacion', $ubicacion)
            ->where('estado', $estado)
            ->get();
        $this->assertCount(1, $aulas);
        $aula = $aulas->first();

        $response->assertRedirect(route('aula.index'));
        $response->assertSessionHas('aula.id', $aula->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $aula = Aula::factory()->create();

        $response = $this->get(route('aula.show', $aula));

        $response->assertOk();
        $response->assertViewIs('aula.show');
        $response->assertViewHas('aula');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $aula = Aula::factory()->create();

        $response = $this->get(route('aula.edit', $aula));

        $response->assertOk();
        $response->assertViewIs('aula.edit');
        $response->assertViewHas('aula');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AulaController::class,
            'update',
            \App\Http\Requests\AulaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $aula = Aula::factory()->create();
        $codigo = $this->faker->word();
        $nombre = $this->faker->word();
        $capacidad = $this->faker->numberBetween(-10000, 10000);
        $ubicacion = $this->faker->word();
        $estado = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('aula.update', $aula), [
            'codigo' => $codigo,
            'nombre' => $nombre,
            'capacidad' => $capacidad,
            'ubicacion' => $ubicacion,
            'estado' => $estado,
        ]);

        $aula->refresh();

        $response->assertRedirect(route('aula.index'));
        $response->assertSessionHas('aula.id', $aula->id);

        $this->assertEquals($codigo, $aula->codigo);
        $this->assertEquals($nombre, $aula->nombre);
        $this->assertEquals($capacidad, $aula->capacidad);
        $this->assertEquals($ubicacion, $aula->ubicacion);
        $this->assertEquals($estado, $aula->estado);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $aula = Aula::factory()->create();

        $response = $this->delete(route('aula.destroy', $aula));

        $response->assertRedirect(route('aula.index'));

        $this->assertModelMissing($aula);
    }
}
