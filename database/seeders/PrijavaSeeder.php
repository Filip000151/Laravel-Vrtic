<?php

namespace Database\Seeders;

use App\Models\Prijava;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrijavaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prijavas')->insert([
            [
            'ime_dete' => 'Petar',
            'prezime_dete' => 'Damjanovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '25.07.2021')->toDateString(),
            'jmbg_dete' => '2507021754364',
            'ime_roditelj' => 'Bogdan',
            'prezime_roditelj' => 'Damjanovic',
            'broj_telefona' => '0632453476',
            'jmbg_roditelj' => '2304995276349',
            'napomene' => 'Alergičan na kikiriki, mlečne proizvode, polen, prašinu, ubode insekata.',
            'administrator_id' => 1,
            'status' => 'potvrdjen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '04.06.2024')->toDateString(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'ime_dete' => 'Jovana',
            'prezime_dete' => 'Dimitrovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '05.08.2020')->toDateString(),
            'jmbg_dete' => '0508020547783',
            'ime_roditelj' => 'Milena',
            'prezime_roditelj' => 'Dimitrovic',
            'broj_telefona' => '0607469255',
            'jmbg_roditelj' => '2304991886523',
            'napomene' => null,
            'administrator_id' => null,
            'status' => 'nepotvrdjen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '25.06.2024')->toDateString(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'ime_dete' => 'Goran',
            'prezime_dete' => 'Krivokapic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '27.01.2021')->toDateString(),
            'jmbg_dete' => '2701021663521',
            'ime_roditelj' => 'Stevan',
            'prezime_roditelj' => 'Krivokapic',
            'broj_telefona' => '0653126489',
            'jmbg_roditelj' => '1102988455562',
            'napomene' => null,
            'administrator_id' => null,
            'status' => 'nepotvrdjen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '17.06.2024')->toDateString(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'ime_dete' => 'Teodora',
            'prezime_dete' => 'Panic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '15.03.2021')->toDateString(),
            'jmbg_dete' => '1503021663821',
            'ime_roditelj' => 'Visnja',
            'prezime_roditelj' => 'Panic',
            'broj_telefona' => '0619836576',
            'jmbg_roditelj' => '0212990582134',
            'napomene' => null,
            'administrator_id' => 1,
            'status' => 'odbijen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '09.05.2024')->toDateString(),
            'created_at' => now(),
            'updated_at' => now()
        ]
        ]);
    }
}
