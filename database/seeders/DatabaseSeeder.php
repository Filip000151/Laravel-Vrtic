<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'filipmilutinovic@gmail.com',
                'password' => \Hash::make('admin'),
                'ime' => 'Filip',
                'prezime' => 'Milutinovic',
                'broj_telefona' => '0643158544',
                'uloga' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        
        $this->call(RoditeljSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GrupaSeeder::class);
        $this->call(DeteSeeder::class);
        $this->call(EvidencijaSeeder::class);
        $this->call(PrijavaSeeder::class);
        $this->call(PrisustvoSeeder::class);
    }
}
