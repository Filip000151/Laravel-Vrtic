<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [
            'ime' => 'Jelena',
            'prezime' => 'Pesic',
            'broj_telefona' => '0603176599',
            'email' => 'jelenapesic@gmail.com',
            'password' => \Hash::make('jelena'),
            'uloga' => 'vaspitac',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'ime' => 'Ivana',
            'prezime' => 'Milanovic',
            'broj_telefona' => '0617174387',
            'email' => 'ivanamilanovic@gmail.com',
            'password' => \Hash::make('ivana'),
            'uloga' => 'vaspitac',
            'created_at' => now(),
            'updated_at' => now()
        ]
        ]);
    }
}
