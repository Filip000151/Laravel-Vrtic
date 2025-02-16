<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Grupa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GrupaController
 */
final class GrupaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $grupas = Grupa::factory()->count(3)->create();

        $response = $this->get(route('grupas.index'));

        $response->assertOk();
        $response->assertViewIs('grupa.index');
        $response->assertViewHas('grupas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('grupas.create'));

        $response->assertOk();
        $response->assertViewIs('grupa.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GrupaController::class,
            'store',
            \App\Http\Requests\GrupaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('grupas.store'));

        $response->assertRedirect(route('grupas.index'));
        $response->assertSessionHas('grupa.id', $grupa->id);

        $this->assertDatabaseHas(grupas, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $grupa = Grupa::factory()->create();

        $response = $this->get(route('grupas.show', $grupa));

        $response->assertOk();
        $response->assertViewIs('grupa.show');
        $response->assertViewHas('grupa');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $grupa = Grupa::factory()->create();

        $response = $this->get(route('grupas.edit', $grupa));

        $response->assertOk();
        $response->assertViewIs('grupa.edit');
        $response->assertViewHas('grupa');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GrupaController::class,
            'update',
            \App\Http\Requests\GrupaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $grupa = Grupa::factory()->create();

        $response = $this->put(route('grupas.update', $grupa));

        $grupa->refresh();

        $response->assertRedirect(route('grupas.index'));
        $response->assertSessionHas('grupa.id', $grupa->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $grupa = Grupa::factory()->create();

        $response = $this->delete(route('grupas.destroy', $grupa));

        $response->assertRedirect(route('grupas.index'));

        $this->assertModelMissing($grupa);
    }
}
