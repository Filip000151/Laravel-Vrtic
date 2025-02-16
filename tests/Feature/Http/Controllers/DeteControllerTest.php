<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Dete;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DeteController
 */
final class DeteControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $detes = Dete::factory()->count(3)->create();

        $response = $this->get(route('detes.index'));

        $response->assertOk();
        $response->assertViewIs('dete.index');
        $response->assertViewHas('detes');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('detes.create'));

        $response->assertOk();
        $response->assertViewIs('dete.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DeteController::class,
            'store',
            \App\Http\Requests\DeteStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('detes.store'));

        $response->assertRedirect(route('detes.index'));
        $response->assertSessionHas('dete.id', $dete->id);

        $this->assertDatabaseHas(detes, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $dete = Dete::factory()->create();

        $response = $this->get(route('detes.show', $dete));

        $response->assertOk();
        $response->assertViewIs('dete.show');
        $response->assertViewHas('dete');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $dete = Dete::factory()->create();

        $response = $this->get(route('detes.edit', $dete));

        $response->assertOk();
        $response->assertViewIs('dete.edit');
        $response->assertViewHas('dete');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DeteController::class,
            'update',
            \App\Http\Requests\DeteUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $dete = Dete::factory()->create();

        $response = $this->put(route('detes.update', $dete));

        $dete->refresh();

        $response->assertRedirect(route('detes.index'));
        $response->assertSessionHas('dete.id', $dete->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $dete = Dete::factory()->create();

        $response = $this->delete(route('detes.destroy', $dete));

        $response->assertRedirect(route('detes.index'));

        $this->assertModelMissing($dete);
    }
}
