<?php

namespace Database\Seeders;

use App\Models\Roditelj;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoditeljSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roditeljs')->insert([
        [
            'ime' => 'Bogdan',
            'prezime' => 'Damjanovic',
            'broj_telefona' => '0632453476',
            'jmbg' => '2304995276349'
        ],
        [
            'ime' => 'Jovan',
            'prezime' => 'Adamovic',
            'broj_telefona' => '0654238712',
            'jmbg' => '1701991476345'
        ],
        [
            'ime' => 'Mirjana',
            'prezime' => 'Stojkovic',
            'broj_telefona' => '0612578324',
            'jmbg' => '0611989265345'
        ]
    ]);
    }
}
