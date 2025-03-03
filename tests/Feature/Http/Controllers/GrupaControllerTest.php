<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Grupa;
use App\Models\User;
use App\Models\Dete;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GrupaController
 */
final class GrupaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_moze_videti_sve_grupe() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $grupe = Grupa::factory(3)->create();

        $response = $this->actingAs($admin)->get(route('grupa.index'));

        foreach($grupe as $grupa){
            $response->assertSee($grupa->naziv);
        }

        $response->assertStatus(200);
    }

    /** @test */
    public function vaspitac_moze_videti_samo_svoje_grupe() : void
    {
        $vaspitac = User::factory()->create(['uloga' => 'vaspitac']);

        $grupa1 = Grupa::factory()->create(['vaspitac_id' => $vaspitac->id]);
        $grupa2 = Grupa::factory()->create();

        $response = $this->actingAs($vaspitac)->get(route('grupa.index'));

        $response->assertSee($grupa1->naziv);
        $response->assertDontSee($grupa2->naziv);

        $response->assertStatus(200);
    }

    /** @test */
    public function vaspitac_moze_pristupiti_svojoj_grupi() : void
    {
        $Vaspitac = User::factory()->create(['uloga' => 'vaspitac']);

        $grupa = Grupa::factory()->create(['vaspitac_id' => $Vaspitac]);

        $response = $this->actingAs($Vaspitac)->get(route('grupa.show', $grupa));

        $response->assertStatus(200);

        $response->assertSee($grupa->naziv); 
    }

    /** @test */
    public function vaspitac_ne_moze_pristupiti_tudjoj_grupi() : void
    {
        $dodeljenVaspitac = User::factory()->create(['uloga' => 'vaspitac']);
        $nedodeljenVaspitac = User::factory()->create(['uloga' => 'vaspitac']);

        $grupa = Grupa::factory()->create(['vaspitac_id' => $dodeljenVaspitac]);

        $response = $this->actingAs($nedodeljenVaspitac)->get(route('grupa.show', $grupa));

        $response->assertStatus(403);
        $response->assertSee('Nemate pravo pristupa ovoj grupi');    
    }

    /** @test */
    public function admin_moze_kreirati_grupe() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);
        $vaspitac = User::factory()->create(['uloga' => 'vaspitac']);

        $podaci = [
            'naziv' => 'Pcelice',
            'vaspitac_id' => (string)$vaspitac->id
        ];

        $response = $this->actingAs($admin)->post(route('grupa.store'), $podaci);

        $this->assertDatabaseHas('grupas', $podaci);

        $response->assertRedirect(route('grupa.index'));
        $response->assertSessionHas('success', 'Grupa je kreirana!');
    }

    /** @test */
    public function admin_moze_azurirati_decu_i_vaspitaca_u_grupi() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);
        $vaspitac = User::factory()->create(['uloga' => 'vaspitac']);

        $grupa = Grupa::factory()->create(['vaspitac_id' => $vaspitac->id]);

        $dete1 = Dete::factory()->create(['grupa_id' => $grupa->id]);
        $dete2 = Dete::factory()->create(['grupa_id' => null]);

        $this->assertEquals($grupa->id, $dete1->grupa_id);
        $this->assertNull($dete2->grupa_id);

        $noviVaspitac = User::factory()->create(['uloga' => 'vaspitac']);

        $response = $this->actingAs($admin)->put(route('grupa.update', $grupa), [
            'naziv' => 'promenjen naziv',
            'vaspitac_id' => $noviVaspitac->id,
            'deca' => [$dete2->id]
        ]);

        $grupa->refresh();

        $this->assertEquals('promenjen naziv', $grupa->naziv);
        $this->assertEquals($noviVaspitac->id, $grupa->vaspitac_id);

        $this->assertNull($dete1->fresh()->grupa_id);
        $this->assertEquals($grupa->id, $dete2->fresh()->grupa_id);

        $response->assertRedirect(route('grupa.show', $grupa));
        $response->assertSessionHas('success', 'Grupa uspešno ažurirana!');
    }
}
