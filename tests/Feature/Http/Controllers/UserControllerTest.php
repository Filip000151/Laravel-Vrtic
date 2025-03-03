<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UserController
 */
final class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_moze_registrovati_novog_vaspitaca_ili_admina() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $podaci = [
            'ime' => 'Marko',
            'prezime' => 'Marković',
            'broj_telefona' => '0631254485',
            'email' => 'marko@gmail.com',
            'password' => 'marko123',
            'password_confirmation' => 'marko123',
            'uloga' => 'vaspitac'
        ];

        $response = $this->actingAs($admin)->post(route('user.store'), $podaci);

        $this->assertDatabaseHas('users', [
            'email' => 'marko@gmail.com',
            'uloga' => 'vaspitac'
        ]);

        $response->assertRedirect(route('user.index'));
        $response->assertSessionHas('success', 'Korisnik je uspešno registrovan!');
    }

    /** @test */
    public function admin_ne_moze_azurirati_korisnika_bez_ispravne_stare_lozinke() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $korisnik = User::factory()->create(['password' => Hash::make('stara lozinka')]);

        $podaci = [
            'old_password' => 'pogresna lozinka',
            'ime' => 'Marko',
            'prezime' => 'Marković',
            'broj_telefona' => '0631254485',
            'email' => 'marko@gmail.com',
            'password' => 'nova lozinka',
            'password_confirmation' => 'nova lozinka'
        ];

        $response = $this->actingAs($admin)->put(route('user.update', $korisnik), $podaci);

        $response->assertRedirect(route('user.index'));
        $response->assertSessionHasErrors(['old_password' => 'Stara lozinka nije tačna!']);
    }

    /** @test */
    public function admin_moze_promeniti_podatke_korisnika() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $korisnik = User::factory()->create(['password' => Hash::make('stara lozinka')]);

        $podaci = [
            'old_password' => 'stara lozinka',
            'ime' => 'Marko',
            'prezime' => 'Marković',
            'broj_telefona' => '0631254485',
            'email' => 'markomarkovic@gmail.com',
            'password' => 'nova lozinka',
            'password_confirmation' => 'nova lozinka'
        ];

        $response = $this->actingAs($admin)->put(route('user.update', $korisnik), $podaci);

        $this->assertDatabaseHas('users', [
            'email' => 'markomarkovic@gmail.com',
            'broj_telefona' => '0631254485',
        ]);

        $response->assertRedirect(route('user.index'));
        $response->assertSessionHas('success', 'Podaci su uspešno ažurirani!');
    }

    /** @test */
    public function admin_moze_promeniti_podatke_korisnika_bez_menjanja_lozinke() : void
    {
        $admin = User::factory()->create(['uloga' => 'admin']);

        $korisnik = User::factory()->create(['password' => Hash::make('stara lozinka')]);

        $podaci = [
            'old_password' => 'stara lozinka',
            'ime' => 'Marko',
            'prezime' => 'Marković',
            'broj_telefona' => '0631254485',
            'email' => 'markomarkovic@gmail.com',
        ];

        $response = $this->actingAs($admin)->put(route('user.update', $korisnik), $podaci);

        $this->assertDatabaseHas('users', [
            'email' => 'markomarkovic@gmail.com',
            'broj_telefona' => '0631254485'
        ]);

        $response->assertRedirect(route('user.index'));
        $response->assertSessionHas('success', 'Podaci su uspešno ažurirani!');
    }
}
