<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Prijava;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_ima_vise_prijava_sortiranih_po_datumu_prijave() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $prijava1 = Prijava::factory()->create([
            'administrator_id' => $admin->id,
            'status' => 'potvrdjen',
            'datum_prijave' => now()->subDay()
        ]);
        $prijava2 = Prijava::factory()->create([
            'administrator_id' => $admin->id,
            'status' => 'odbijen',
            'datum_prijave' => now()->subDays(3)
        ]);
        $prijava3 = Prijava::factory()->create([
            'administrator_id' => $admin->id,
            'status' => 'potvrdjen',
            'datum_prijave' => now()->subDays(2)
        ]);

        $prijave = $admin->prijave;

        $this->assertCount(3, $prijave);

        $this->assertEquals($prijava1->id, $prijave->first()->id);
        $this->assertEquals($prijava2->id, $prijave->last()->id);
    }
}
