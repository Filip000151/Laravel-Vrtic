<?php

namespace Database\Seeders;

use App\Models\Grupa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GrupaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grupas')->insert([
        [
            'naziv' => 'Leptirici',
            'vaspitac_id' => 2
        ],
        [
            'naziv' => 'Pcelice',
            'vaspitac_id' => 2
        ],
        [
            'naziv' => 'Cvetici',
            'vaspitac_id' => 3
        ]
        ]);
    }
}
