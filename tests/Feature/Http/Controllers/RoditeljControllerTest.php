<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Roditelj;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RoditeljController
 */
final class RoditeljControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $roditeljs = Roditelj::factory()->count(3)->create();

        $response = $this->get(route('roditeljs.index'));

        $response->assertOk();
        $response->assertViewIs('roditelj.index');
        $response->assertViewHas('roditeljs');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('roditeljs.create'));

        $response->assertOk();
        $response->assertViewIs('roditelj.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RoditeljController::class,
            'store',
            \App\Http\Requests\RoditeljStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('roditeljs.store'));

        $response->assertRedirect(route('roditeljs.index'));
        $response->assertSessionHas('roditelj.id', $roditelj->id);

        $this->assertDatabaseHas(roditeljs, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $roditelj = Roditelj::factory()->create();

        $response = $this->get(route('roditeljs.show', $roditelj));

        $response->assertOk();
        $response->assertViewIs('roditelj.show');
        $response->assertViewHas('roditelj');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $roditelj = Roditelj::factory()->create();

        $response = $this->get(route('roditeljs.edit', $roditelj));

        $response->assertOk();
        $response->assertViewIs('roditelj.edit');
        $response->assertViewHas('roditelj');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RoditeljController::class,
            'update',
            \App\Http\Requests\RoditeljUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $roditelj = Roditelj::factory()->create();

        $response = $this->put(route('roditeljs.update', $roditelj));

        $roditelj->refresh();

        $response->assertRedirect(route('roditeljs.index'));
        $response->assertSessionHas('roditelj.id', $roditelj->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $roditelj = Roditelj::factory()->create();

        $response = $this->delete(route('roditeljs.destroy', $roditelj));

        $response->assertRedirect(route('roditeljs.index'));

        $this->assertModelMissing($roditelj);
    }
}
