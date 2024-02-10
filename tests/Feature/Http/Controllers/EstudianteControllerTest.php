<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Estudiante;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EstudianteController
 */
final class EstudianteControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $estudiantes = Estudiante::factory()->count(3)->create();

        $response = $this->get(route('estudiante.index'));

        $response->assertOk();
        $response->assertViewIs('estudiante.index');
        $response->assertViewHas('estudiantes');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('estudiante.create'));

        $response->assertOk();
        $response->assertViewIs('estudiante.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EstudianteController::class,
            'store',
            \App\Http\Requests\EstudianteStoreRequest::class
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
        $genero = $this->faker->word();
        $email = $this->faker->safeEmail();
        $telefono = $this->faker->word();
        $estado = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('estudiante.store'), [
            'ci' => $ci,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'direccion' => $direccion,
            'fec_nac' => $fec_nac,
            'genero' => $genero,
            'email' => $email,
            'telefono' => $telefono,
            'estado' => $estado,
        ]);

        $estudiantes = Estudiante::query()
            ->where('ci', $ci)
            ->where('nombres', $nombres)
            ->where('apellidos', $apellidos)
            ->where('direccion', $direccion)
            ->where('fec_nac', $fec_nac)
            ->where('genero', $genero)
            ->where('email', $email)
            ->where('telefono', $telefono)
            ->where('estado', $estado)
            ->get();
        $this->assertCount(1, $estudiantes);
        $estudiante = $estudiantes->first();

        $response->assertRedirect(route('estudiante.index'));
        $response->assertSessionHas('estudiante.id', $estudiante->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $estudiante = Estudiante::factory()->create();

        $response = $this->get(route('estudiante.show', $estudiante));

        $response->assertOk();
        $response->assertViewIs('estudiante.show');
        $response->assertViewHas('estudiante');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $estudiante = Estudiante::factory()->create();

        $response = $this->get(route('estudiante.edit', $estudiante));

        $response->assertOk();
        $response->assertViewIs('estudiante.edit');
        $response->assertViewHas('estudiante');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EstudianteController::class,
            'update',
            \App\Http\Requests\EstudianteUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $estudiante = Estudiante::factory()->create();
        $ci = $this->faker->word();
        $nombres = $this->faker->word();
        $apellidos = $this->faker->word();
        $direccion = $this->faker->word();
        $fec_nac = $this->faker->date();
        $genero = $this->faker->word();
        $email = $this->faker->safeEmail();
        $telefono = $this->faker->word();
        $estado = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('estudiante.update', $estudiante), [
            'ci' => $ci,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'direccion' => $direccion,
            'fec_nac' => $fec_nac,
            'genero' => $genero,
            'email' => $email,
            'telefono' => $telefono,
            'estado' => $estado,
        ]);

        $estudiante->refresh();

        $response->assertRedirect(route('estudiante.index'));
        $response->assertSessionHas('estudiante.id', $estudiante->id);

        $this->assertEquals($ci, $estudiante->ci);
        $this->assertEquals($nombres, $estudiante->nombres);
        $this->assertEquals($apellidos, $estudiante->apellidos);
        $this->assertEquals($direccion, $estudiante->direccion);
        $this->assertEquals(Carbon::parse($fec_nac), $estudiante->fec_nac);
        $this->assertEquals($genero, $estudiante->genero);
        $this->assertEquals($email, $estudiante->email);
        $this->assertEquals($telefono, $estudiante->telefono);
        $this->assertEquals($estado, $estudiante->estado);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $estudiante = Estudiante::factory()->create();

        $response = $this->delete(route('estudiante.destroy', $estudiante));

        $response->assertRedirect(route('estudiante.index'));

        $this->assertModelMissing($estudiante);
    }
}
