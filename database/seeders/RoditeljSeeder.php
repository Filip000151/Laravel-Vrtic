<?php

namespace Database\Seeders;

use App\Models\Roditelj;
use Illuminate\Database\Seeder;

class RoditeljSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roditelj::factory()
            ->count(5)
            ->create();
    }
}
