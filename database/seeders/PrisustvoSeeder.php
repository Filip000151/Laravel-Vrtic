<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrisustvoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prisustvo')->insert([
        [
            'evidencija_id' => 1,
            'dete_id' => 1,
            'status' => 'prisutan',
            'napomena' => null
        ],
        [
            'evidencija_id' => 1,
            'dete_id' => 2,
            'status' => 'prisutan',
            'napomena' => 'Kasnjenje'
        ],
        [
            'evidencija_id' => 1,
            'dete_id' => 4,
            'status' => 'odsutan',
            'napomena' => null
        ],
        [
            'evidencija_id' => 2,
            'dete_id' => 3,
            'status' => 'prisutan',
            'napomena' => null
        ],
        [
            'evidencija_id' => 3,
            'dete_id' => 1,
            'status' => 'prisutan',
            'napomena' => null
        ],
        [
            'evidencija_id' => 3,
            'dete_id' => 2,
            'status' => 'prisutan',
            'napomena' => null
        ],
        [
            'evidencija_id' => 3,
            'dete_id' => 4,
            'status' => 'opravdano',
            'napomena' => 'Ima temperaturu'
        ]
        ]);
    }
}
