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
            'ime_dete' => 'Filip',
            'prezime_dete' => 'Damjanovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '15.09.2020')->toDateString(),
            'jmbg_dete' => '1509020543692',
            'ime_roditelj' => 'Bogdan',
            'prezime_roditelj' => 'Damjanovic',
            'broj_telefona' => '0632453476',
            'jmbg_roditelj' => '2304995276349',
            'napomene' => 'Intolerancija na laktozu, ne sme mlečne proizvode.',
            'administrator_id' => 1,
            'status' => 'potvrdjen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '19.08.2023')->toDateString(),
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
        ],
        [
            'ime_dete' => 'Jovana',
            'prezime_dete' => 'Ilic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '20.04.2021')->toDateString(),
            'jmbg_dete' => '2004021546312',
            'ime_roditelj' => 'Viktor',
            'prezime_roditelj' => 'Ilic',
            'broj_telefona' => '0618924435',
            'jmbg_roditelj' => '0212991294857',
            'napomene' => null,
            'administrator_id' => null,
            'status' => 'nepotvrdjen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '04.02.2024')->toDateString(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'ime_dete' => 'Zoran',
            'prezime_dete' => 'Nikolic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '03.01.2021')->toDateString(),
            'jmbg_dete' => '0301021534971',
            'ime_roditelj' => 'Marija',
            'prezime_roditelj' => 'Nikolic',
            'broj_telefona' => '0658732456',
            'jmbg_roditelj' => '0609992785463',
            'napomene' => null,
            'administrator_id' => null,
            'status' => 'nepotvrdjen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '10.02.2024')->toDateString(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'ime_dete' => 'Stefan',
            'prezime_dete' => 'Adamovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '08.04.2021')->toDateString(),
            'jmbg_dete' => '0804021743765',
            'ime_roditelj' => 'Jovan',
            'prezime_roditelj' => 'Adamovic',
            'broj_telefona' => '0654238712',
            'jmbg_roditelj' => '1701991476345',
            'napomene' => 'Astma, koristi pumpicu po potrebi.',
            'administrator_id' => 1,
            'status' => 'potvrdjen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '13.01.2024')->toDateString(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'ime_dete' => 'Milica',
            'prezime_dete' => 'Stojkovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '14.09.2020')->toDateString(),
            'jmbg_dete' => '1409020538821',
            'ime_roditelj' => 'Mirjana',
            'prezime_roditelj' => 'Stojkovic',
            'broj_telefona' => '0612578324',
            'jmbg_roditelj' => '0611989265345',
            'napomene' => null,
            'administrator_id' => 1,
            'status' => 'potvrdjen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '13.01.2024')->toDateString(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'ime_dete' => 'Filip',
            'prezime_dete' => 'Damjanovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '15.09.2020')->toDateString(),
            'jmbg_dete' => '1509020543692',
            'ime_roditelj' => 'Bogdan',
            'prezime_roditelj' => 'Damjanovic',
            'broj_telefona' => '0632453476',
            'jmbg_roditelj' => '2304995276349',
            'napomene' => 'Intolerancija na laktozu, ne sme mlečne proizvode.',
            'administrator_id' => null,
            'status' => 'nepotvrdjen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '19.08.2023')->toDateString(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'ime_dete' => 'Andreja',
            'prezime_dete' => 'Stojkovic',
            'datum_rodjenja' => Carbon::createFromFormat('d.m.Y', '27.01.2020')->toDateString(),
            'jmbg_dete' => '2701020635864',
            'ime_roditelj' => 'Mirjana',
            'prezime_roditelj' => 'Stojkovic',
            'broj_telefona' => '0612578324',
            'jmbg_roditelj' => '0611989265345',
            'napomene' => null,
            'administrator_id' => null,
            'status' => 'nepotvrdjen',
            'datum_prijave' => Carbon::createFromFormat('d.m.Y', '11.05.2023')->toDateString(),
            'created_at' => now(),
            'updated_at' => now()
        ]
        ]);
    }
}
