<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Evidencija;
use App\Models\User;
use App\Models\Grupa;
use App\Models\Dete;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EvidencijaController
 */
final class EvidencijaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function vaspitac_moze_da_kreira_evidenciju_za_svoju_grupu() : void
    {
        $vaspitac = User::factory()->create(['uloga' => 'vaspitac']);


        $grupa = Grupa::factory()->create();
        $dete1 = Dete::factory()->create();
        $dete2 = Dete::factory()->create();

        $requestPodaci = [
            'grupa_id' => $grupa->id,
            'datum' => now()->toDateTimeString(),
            'deca' => [
                [
                    'dete_id' => $dete1->id,
                    'status' => 'prisutan',
                    'napomena' => null
                ],
                [
                    'dete_id' => $dete2->id,
                    'status' => 'odsutan',
                    'napomena' => 'neka napomena'
                ]
            ]
        ];

        $response = $this->actingAs($vaspitac)->post(route('evidencija.store'), $requestPodaci);

        $this->assertDatabaseHas('evidencijas', [
            'grupa_id' => $grupa->id,
            'datum' => $requestPodaci['datum']
        ]);

        foreach($requestPodaci['deca'] as $dete){
            $this->assertDatabaseHas('prisustvo', [
                'evidencija_id' => Evidencija::latest()->first()->id,
                'dete_id' => $dete['dete_id'],
                'status' => $dete['status'],
                'napomena' => $dete['napomena'] ?? null
            ]);
        }

        $response->assertRedirect(route('grupa.show', ['grupa' => $grupa->id]));
        $response->assertSessionHas('success', 'Evidencija uspešno napravljena!');
    }
}
