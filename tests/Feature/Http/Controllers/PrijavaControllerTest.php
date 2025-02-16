<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Prijava;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PrijavaController
 */
final class PrijavaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $prijavas = Prijava::factory()->count(3)->create();

        $response = $this->get(route('prijavas.index'));

        $response->assertOk();
        $response->assertViewIs('prijava.index');
        $response->assertViewHas('prijavas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('prijavas.create'));

        $response->assertOk();
        $response->assertViewIs('prijava.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PrijavaController::class,
            'store',
            \App\Http\Requests\PrijavaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('prijavas.store'));

        $response->assertRedirect(route('prijavas.index'));
        $response->assertSessionHas('prijava.id', $prijava->id);

        $this->assertDatabaseHas(prijavas, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $prijava = Prijava::factory()->create();

        $response = $this->get(route('prijavas.show', $prijava));

        $response->assertOk();
        $response->assertViewIs('prijava.show');
        $response->assertViewHas('prijava');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $prijava = Prijava::factory()->create();

        $response = $this->get(route('prijavas.edit', $prijava));

        $response->assertOk();
        $response->assertViewIs('prijava.edit');
        $response->assertViewHas('prijava');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PrijavaController::class,
            'update',
            \App\Http\Requests\PrijavaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $prijava = Prijava::factory()->create();

        $response = $this->put(route('prijavas.update', $prijava));

        $prijava->refresh();

        $response->assertRedirect(route('prijavas.index'));
        $response->assertSessionHas('prijava.id', $prijava->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $prijava = Prijava::factory()->create();

        $response = $this->delete(route('prijavas.destroy', $prijava));

        $response->assertRedirect(route('prijavas.index'));

        $this->assertModelMissing($prijava);
    }
}
