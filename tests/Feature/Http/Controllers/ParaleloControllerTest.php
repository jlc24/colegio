<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Paralelo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ParaleloController
 */
final class ParaleloControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $paralelos = Paralelo::factory()->count(3)->create();

        $response = $this->get(route('paralelo.index'));

        $response->assertOk();
        $response->assertViewIs('paralelo.index');
        $response->assertViewHas('paralelos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('paralelo.create'));

        $response->assertOk();
        $response->assertViewIs('paralelo.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ParaleloController::class,
            'store',
            \App\Http\Requests\ParaleloStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $paralelo = $this->faker->word();

        $response = $this->post(route('paralelo.store'), [
            'paralelo' => $paralelo,
        ]);

        $paralelos = Paralelo::query()
            ->where('paralelo', $paralelo)
            ->get();
        $this->assertCount(1, $paralelos);
        $paralelo = $paralelos->first();

        $response->assertRedirect(route('paralelo.index'));
        $response->assertSessionHas('paralelo.id', $paralelo->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $paralelo = Paralelo::factory()->create();

        $response = $this->get(route('paralelo.show', $paralelo));

        $response->assertOk();
        $response->assertViewIs('paralelo.show');
        $response->assertViewHas('paralelo');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $paralelo = Paralelo::factory()->create();

        $response = $this->get(route('paralelo.edit', $paralelo));

        $response->assertOk();
        $response->assertViewIs('paralelo.edit');
        $response->assertViewHas('paralelo');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ParaleloController::class,
            'update',
            \App\Http\Requests\ParaleloUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $paralelo = Paralelo::factory()->create();
        $paralelo = $this->faker->word();

        $response = $this->put(route('paralelo.update', $paralelo), [
            'paralelo' => $paralelo,
        ]);

        $paralelo->refresh();

        $response->assertRedirect(route('paralelo.index'));
        $response->assertSessionHas('paralelo.id', $paralelo->id);

        $this->assertEquals($paralelo, $paralelo->paralelo);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $paralelo = Paralelo::factory()->create();

        $response = $this->delete(route('paralelo.destroy', $paralelo));

        $response->assertRedirect(route('paralelo.index'));

        $this->assertModelMissing($paralelo);
    }
}
