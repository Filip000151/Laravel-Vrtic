<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Dete;
use App\Models\Prijava;
use App\Models\Roditelj;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DeteController
 */
final class DeteControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ispis_deteta_i_brisanje_roditelja_ako_ima_samo_jedno_dete() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $roditelj = Roditelj::factory()->create();
        $dete = Dete::factory()->create(['roditelj_id' => $roditelj->id]);

        $prijava = Prijava::factory()->create([
            'jmbg_dete' => $dete->jmbg,
            'status' => 'potvrdjen'
        ]);

        $this->assertDatabaseHas('detes', ['id' => $dete->id]);
        $this->assertDatabaseHas('roditeljs', ['id' => $roditelj->id]);
        $this->assertDatabaseHas('prijavas', ['status' => 'potvrdjen']);

        $response = $this->actingAs($admin)->delete(route('dete.destroy', $dete));

        $this->assertDatabaseMissing('roditeljs', ['id' => $roditelj->id]);
        $this->assertDatabaseMissing('detes', ['id' => $dete->id]);

        $this->assertDatabaseHas('prijavas', [
            'jmbg_dete' => $dete->jmbg,
            'status' => 'ispisan'
        ]);

        $response->assertRedirect(route('dete.index'));
        $response->assertSessionHas('success', 'Dete je ispisano!');
    }

    /** @test */
    public function ispis_deteta_i_cuvanje_roditelja_ako_ima_vise_od_jednog_deteta() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $roditelj = Roditelj::factory()->create();
        $dete1 = Dete::factory()->create(['roditelj_id' => $roditelj->id]);
        $dete2 = Dete::factory()->create(['roditelj_id' => $roditelj->id]);

        $prijava1 = Prijava::factory()->create([
            'jmbg_dete' => $dete1->jmbg,
            'status' => 'potvrdjen'
        ]);
        $prijava2 = Prijava::factory()->create([
            'jmbg_dete' => $dete2->jmbg,
            'status' => 'potvrdjen'
        ]);

        $this->assertDatabaseHas('detes', ['id' => $dete1->id]);
        $this->assertDatabaseHas('detes', ['id' => $dete2->id]);
        $this->assertDatabaseHas('roditeljs', ['id' => $roditelj->id]);
        $this->assertDatabaseCount('prijavas', 2);

        $response = $this->actingAs($admin)->delete(route('dete.destroy', $dete1));

        $this->assertDatabaseHas('roditeljs', ['id' => $roditelj->id]);
        $this->assertDatabaseMissing('detes', ['id' => $dete1->id]);

        $this->assertDatabaseHas('prijavas', [
            'jmbg_dete' => $dete1->jmbg,
            'status' => 'ispisan'
        ]);

        $response->assertRedirect(route('dete.index'));
        $response->assertSessionHas('success', 'Dete je ispisano!');
    }

}
