<?php

namespace Database\Seeders;

use App\Models\Grupa;
use Illuminate\Database\Seeder;

class GrupaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grupa::factory()
            ->count(5)
            ->create();
    }
}
