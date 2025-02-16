<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Evidencija;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EvidencijaController
 */
final class EvidencijaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $evidencijas = Evidencija::factory()->count(3)->create();

        $response = $this->get(route('evidencijas.index'));

        $response->assertOk();
        $response->assertViewIs('evidencija.index');
        $response->assertViewHas('evidencijas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('evidencijas.create'));

        $response->assertOk();
        $response->assertViewIs('evidencija.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EvidencijaController::class,
            'store',
            \App\Http\Requests\EvidencijaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('evidencijas.store'));

        $response->assertRedirect(route('evidencijas.index'));
        $response->assertSessionHas('evidencija.id', $evidencija->id);

        $this->assertDatabaseHas(evidencijas, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $evidencija = Evidencija::factory()->create();

        $response = $this->get(route('evidencijas.show', $evidencija));

        $response->assertOk();
        $response->assertViewIs('evidencija.show');
        $response->assertViewHas('evidencija');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $evidencija = Evidencija::factory()->create();

        $response = $this->get(route('evidencijas.edit', $evidencija));

        $response->assertOk();
        $response->assertViewIs('evidencija.edit');
        $response->assertViewHas('evidencija');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EvidencijaController::class,
            'update',
            \App\Http\Requests\EvidencijaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $evidencija = Evidencija::factory()->create();

        $response = $this->put(route('evidencijas.update', $evidencija));

        $evidencija->refresh();

        $response->assertRedirect(route('evidencijas.index'));
        $response->assertSessionHas('evidencija.id', $evidencija->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $evidencija = Evidencija::factory()->create();

        $response = $this->delete(route('evidencijas.destroy', $evidencija));

        $response->assertRedirect(route('evidencijas.index'));

        $this->assertModelMissing($evidencija);
    }
}
