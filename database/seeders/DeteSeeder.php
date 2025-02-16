<?php

namespace Database\Seeders;

use App\Models\Dete;
use Illuminate\Database\Seeder;

class DeteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dete::factory()
            ->count(5)
            ->create();
    }
}
