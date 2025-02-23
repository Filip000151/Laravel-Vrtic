<?php

namespace Database\Seeders;

use App\Models\Evidencija;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvidencijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evidencijas')->insert([
        [
            'datum' => Carbon::createFromFormat('d.m.Y', '01.03.2025')->toDateString(),
            'grupa_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'datum' => Carbon::createFromFormat('d.m.Y', '05.03.2025')->toDateString(),
            'grupa_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'datum' => Carbon::createFromFormat('d.m.Y', '07.03.2025')->toDateString(),
            'grupa_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]
        ]);
    }
}
