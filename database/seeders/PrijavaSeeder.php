<?php

namespace Database\Seeders;

use App\Models\Prijava;
use Illuminate\Database\Seeder;

class PrijavaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prijava::factory()
            ->count(5)
            ->create();
    }
}
