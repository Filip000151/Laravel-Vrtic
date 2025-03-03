<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Roditelj;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RoditeljController
 */
final class RoditeljControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function vaspitac_moze_videti_roditelja() : void
    {
        $vaspitac = User::factory()->create(['uloga' => 'vaspitac']);
    
        $roditelj = Roditelj::factory()->create();
    
        $response = $this->actingAs($vaspitac)->get(route('roditelj.show', $roditelj));
    
        $response->assertStatus(200);
        
        $response->assertViewIs('roditelj.show');
        $response->assertViewHas('roditelj', $roditelj);
    }
}
