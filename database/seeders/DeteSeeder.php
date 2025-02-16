<?php

namespace Database\Seeders;

use App\Models\Dete;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detes')->insert([
        [
            'ime' => 'Petar',
            'prezime' => 'Damjanovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '25.07.2021')->toDateString(),
            'napomene' => 'Alergičan/na na kikiriki, mlečne proizvode, polen, prašinu, ubode insekata.',
            'jmbg' => '2507021754364',
            'roditelj_id' => 1,
            'grupa_id' => 1
        ],
        [
            'ime' => 'Filip',
            'prezime' => 'Damjanovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '11.11.2020')->toDateString(),
            'napomene' => 'Intolerancija na laktozu, ne sme mlečne proizvode.',
            'jmbg' => '1111020543692',
            'roditelj_id' => 1,
            'grupa_id' => 1
        ],
        [
            'ime' => 'Stefan',
            'prezime' => 'Adamovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '08.04.2021')->toDateString(),
            'napomene' => 'Astma, koristi pumpicu po potrebi.',
            'jmbg' => '0804021743765',
            'roditelj_id' => 2,
            'grupa_id' => 2
        ],
        [
            'ime' => 'Milica',
            'prezime' => 'Stojkovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '14.09.2020')->toDateString(),
            'napomene' => null,
            'jmbg' => '1409020538821',
            'roditelj_id' => 3,
            'grupa_id' => 1
        ]
        ]);
    }
}
