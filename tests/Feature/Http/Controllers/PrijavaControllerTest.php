<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Prijava;
use App\Models\Dete;
use App\Models\Roditelj;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PrijavaController
 */
final class PrijavaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function bilo_ko_moze_podneti_prijavu_za_upis() : void
    {
        $podaci = Prijava::factory()->make()->toArray();

        $response = $this->post(route('prijava.store'), $podaci);

        $this->assertDatabaseHas('prijavas', [
            'jmbg_dete' => $podaci['jmbg_dete'],
            'ime_dete' => $podaci['ime_dete'],
            'prezime_dete' => $podaci['prezime_dete']
        ]);

        $response->assertRedirect(route('prijava.create'));

        $response->assertSessionHas('success', 'Prijava je uspešno podneta!');
    }

    /** @test */
    public function admin_moze_da_potvrdi_prijavu_i_sacuva_dete_i_roditelja_u_bazu_ako_ih_vec_nema() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $prijava = Prijava::factory()->create([
            'status' => 'nepotvrdjen',
            'administrator_id' => null
        ]);

        $this->assertDatabaseMissing('detes', ['jmbg' => $prijava->jmbg_dete]);
        $this->assertDatabaseMissing('roditeljs', ['jmbg' => $prijava->jmbg_roditelj]);

        $response = $this->actingAs($admin)->put(route('prijava.potvrdi', $prijava));

        $prijava->refresh();

        $this->assertEquals('potvrdjen', $prijava->status);

        $dete = Dete::where('jmbg', $prijava->jmbg_dete)->first();
        $this->assertNotNull($dete);

        $this->assertEquals($admin->id, $prijava->administrator_id);

        $roditelj = Roditelj::where('jmbg', $prijava->jmbg_roditelj)->first();
        $this->assertNotNull($roditelj);

        $response->assertRedirect(route('prijava.index', ['status' => 'potvrdjen']));
        $response->assertSessionHas('success', 'Prijava je uspešno potvrđena!');
        
    }

    /** @test */
    public function admin_moze_da_potvrdi_prijavu_i_sacuva_dete_u_bazu_i_poveze_ga_sa_postojecim_roditeljem() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $prijava = Prijava::factory()->create([
            'status' => 'nepotvrdjen',
            'administrator_id' => null
        ]);

        $roditelj = Roditelj::factory()->create(['jmbg' => $prijava->jmbg_roditelj]);

        $this->assertDatabaseMissing('detes', ['jmbg' => $prijava->jmbg_dete]);

        $response = $this->actingAs($admin)->put(route('prijava.potvrdi', $prijava));

        $prijava->refresh();
        $this->assertEquals('potvrdjen', $prijava->status);

        $dete = Dete::where('jmbg', $prijava->jmbg_dete)->first();
        $this->assertNotNull($dete);

        $this->assertEquals($roditelj->id, $dete->roditelj_id);

        $this->assertEquals($admin->id, $prijava->administrator_id);

        $response->assertRedirect(route('prijava.index', ['status' => 'potvrdjen']));
        $response->assertSessionHas('success', 'Prijava je uspešno potvrđena!');
    }

    /** @test */
    public function admin_ne_moze_da_potvrdi_prijavu_ako_dete_vec_postoji_u_bazi() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $prijava = Prijava::factory()->create([
            'status' => 'nepotvrdjen',
            'administrator_id' => null
        ]);

        Dete::factory()->create(['jmbg' => $prijava->jmbg_dete]);

        $response = $this->actingAs($admin)->put(route('prijava.potvrdi', $prijava));

        $this->assertEquals('nepotvrdjen', $prijava->status);

        $response->assertRedirect(route('prijava.show', ['prijava' => $prijava->id]));
        $response->assertSessionHasErrors(['error' => 'Dete sa ovim JMBG-om već postoji u bazi, prijava ne može biti potvrđena!']);
    }
}
