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
            'vaspitac_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naziv' => 'Pcelice',
            'vaspitac_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naziv' => 'Cvetici',
            'vaspitac_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]
        ]);
    }
}
