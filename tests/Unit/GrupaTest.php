<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Grupa;
use App\Models\Evidencija;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GrupaTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function grupa_ima_vise_evidencija_sortirano_po_datumu(): void
    {
        $grupa = Grupa::factory()->create();

        $evidencija1 = Evidencija::factory()->create([
            'grupa_id' => $grupa->id,
            'datum' => now()->subDays(3)
        ]);
        $evidencija2 = Evidencija::factory()->create([
            'grupa_id' => $grupa->id,
            'datum' => now()->subDay()
        ]);
        $evidencija3 = Evidencija::factory()->create([
            'grupa_id' => $grupa->id,
            'datum' => now()->subDays(2)
        ]);

        $evidencije = $grupa->evidencije;

        $this->assertCount(3, $evidencije);

        $this->assertEquals($evidencija2->id, $evidencije->first()->id);
        $this->assertEquals($evidencija1->id, $evidencije->last()->id);
    }
}
