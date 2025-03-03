<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Dete;
use App\Models\Evidencija;

class PivotPrisustvoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function evidencija_ima_vise_dece_i_dete_ima_vise_evidencija() : void
    {
        $dete1 = Dete::factory()->create();
        $dete2 = Dete::factory()->create();
        $evidencija1 = Evidencija::factory()->create();
        $evidencija2 = Evidencija::factory()->create();

        $evidencija1->deca()->attach($dete1->id, [
            'status' => 'prisutan',
            'napomena' => null
        ]);
        $evidencija1->deca()->attach($dete2->id, [
            'status' => 'odsutan',
            'napomena' => 'neka napomena'
        ]);

        $evidencija2->deca()->attach($dete1->id, [
            'status' => 'prisutan',
            'napomena' => null
        ]);
        $evidencija2->deca()->attach($dete2->id, [
            'status' => 'prisutan',
            'napomena' => null
        ]);

        $this->assertTrue($evidencija1->deca->contains($dete1));
        $this->assertTrue($evidencija1->deca->contains($dete2));
        $this->assertTrue($dete1->evidencije->contains($evidencija1));
        $this->assertTrue($dete1->evidencije->contains($evidencija2));

        $podaci1 = $evidencija1->deca()->where('dete_id', $dete1->id)->first()->pivot;

        $this->assertEquals('prisutan', $podaci1->status);
        $this->assertNull($podaci1->napomena);

        $podaci2 = $evidencija1->deca()->where('dete_id', $dete2->id)->first()->pivot;

        $this->assertEquals('odsutan', $podaci2->status);
        $this->assertEquals('neka napomena', $podaci2->napomena);
    }
}
