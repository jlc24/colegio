<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Profesor;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProfesorController
 */
final class ProfesorControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $profesors = Profesor::factory()->count(3)->create();

        $response = $this->get(route('profesor.index'));

        $response->assertOk();
        $response->assertViewIs('profesor.index');
        $response->assertViewHas('profesors');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('profesor.create'));

        $response->assertOk();
        $response->assertViewIs('profesor.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProfesorController::class,
            'store',
            \App\Http\Requests\ProfesorStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $ci = $this->faker->word();
        $nombres = $this->faker->word();
        $apellidos = $this->faker->word();
        $direccion = $this->faker->word();
        $fec_nac = $this->faker->date();
        $especialidad = $this->faker->word();
        $email = $this->faker->safeEmail();
        $telefono = $this->faker->word();
        $estado = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('profesor.store'), [
            'ci' => $ci,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'direccion' => $direccion,
            'fec_nac' => $fec_nac,
            'especialidad' => $especialidad,
            'email' => $email,
            'telefono' => $telefono,
            'estado' => $estado,
        ]);

        $profesors = Profesor::query()
            ->where('ci', $ci)
            ->where('nombres', $nombres)
            ->where('apellidos', $apellidos)
            ->where('direccion', $direccion)
            ->where('fec_nac', $fec_nac)
            ->where('especialidad', $especialidad)
            ->where('email', $email)
            ->where('telefono', $telefono)
            ->where('estado', $estado)
            ->get();
        $this->assertCount(1, $profesors);
        $profesor = $profesors->first();

        $response->assertRedirect(route('profesor.index'));
        $response->assertSessionHas('profesor.id', $profesor->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $profesor = Profesor::factory()->create();

        $response = $this->get(route('profesor.show', $profesor));

        $response->assertOk();
        $response->assertViewIs('profesor.show');
        $response->assertViewHas('profesor');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $profesor = Profesor::factory()->create();

        $response = $this->get(route('profesor.edit', $profesor));

        $response->assertOk();
        $response->assertViewIs('profesor.edit');
        $response->assertViewHas('profesor');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProfesorController::class,
            'update',
            \App\Http\Requests\ProfesorUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $profesor = Profesor::factory()->create();
        $ci = $this->faker->word();
        $nombres = $this->faker->word();
        $apellidos = $this->faker->word();
        $direccion = $this->faker->word();
        $fec_nac = $this->faker->date();
        $especialidad = $this->faker->word();
        $email = $this->faker->safeEmail();
        $telefono = $this->faker->word();
        $estado = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('profesor.update', $profesor), [
            'ci' => $ci,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'direccion' => $direccion,
            'fec_nac' => $fec_nac,
            'especialidad' => $especialidad,
            'email' => $email,
            'telefono' => $telefono,
            'estado' => $estado,
        ]);

        $profesor->refresh();

        $response->assertRedirect(route('profesor.index'));
        $response->assertSessionHas('profesor.id', $profesor->id);

        $this->assertEquals($ci, $profesor->ci);
        $this->assertEquals($nombres, $profesor->nombres);
        $this->assertEquals($apellidos, $profesor->apellidos);
        $this->assertEquals($direccion, $profesor->direccion);
        $this->assertEquals(Carbon::parse($fec_nac), $profesor->fec_nac);
        $this->assertEquals($especialidad, $profesor->especialidad);
        $this->assertEquals($email, $profesor->email);
        $this->assertEquals($telefono, $profesor->telefono);
        $this->assertEquals($estado, $profesor->estado);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $profesor = Profesor::factory()->create();

        $response = $this->delete(route('profesor.destroy', $profesor));

        $response->assertRedirect(route('profesor.index'));

        $this->assertModelMissing($profesor);
    }
}
