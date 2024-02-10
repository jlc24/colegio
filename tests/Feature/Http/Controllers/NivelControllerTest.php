<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\NivelController
 */
final class NivelControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $nivels = Nivel::factory()->count(3)->create();

        $response = $this->get(route('nivel.index'));

        $response->assertOk();
        $response->assertViewIs('nivel.index');
        $response->assertViewHas('nivels');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('nivel.create'));

        $response->assertOk();
        $response->assertViewIs('nivel.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NivelController::class,
            'store',
            \App\Http\Requests\NivelStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $nivel = $this->faker->word();

        $response = $this->post(route('nivel.store'), [
            'nivel' => $nivel,
        ]);

        $nivels = Nivel::query()
            ->where('nivel', $nivel)
            ->get();
        $this->assertCount(1, $nivels);
        $nivel = $nivels->first();

        $response->assertRedirect(route('nivel.index'));
        $response->assertSessionHas('nivel.id', $nivel->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $nivel = Nivel::factory()->create();

        $response = $this->get(route('nivel.show', $nivel));

        $response->assertOk();
        $response->assertViewIs('nivel.show');
        $response->assertViewHas('nivel');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $nivel = Nivel::factory()->create();

        $response = $this->get(route('nivel.edit', $nivel));

        $response->assertOk();
        $response->assertViewIs('nivel.edit');
        $response->assertViewHas('nivel');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NivelController::class,
            'update',
            \App\Http\Requests\NivelUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $nivel = Nivel::factory()->create();
        $nivel = $this->faker->word();

        $response = $this->put(route('nivel.update', $nivel), [
            'nivel' => $nivel,
        ]);

        $nivel->refresh();

        $response->assertRedirect(route('nivel.index'));
        $response->assertSessionHas('nivel.id', $nivel->id);

        $this->assertEquals($nivel, $nivel->nivel);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $nivel = Nivel::factory()->create();

        $response = $this->delete(route('nivel.destroy', $nivel));

        $response->assertRedirect(route('nivel.index'));

        $this->assertModelMissing($nivel);
    }
}
