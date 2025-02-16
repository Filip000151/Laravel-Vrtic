<?php

namespace Database\Seeders;

use App\Models\Evidencija;
use Illuminate\Database\Seeder;

class EvidencijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evidencija::factory()
            ->count(5)
            ->create();
    }
}
