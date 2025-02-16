<?php

namespace Database\Factories;

use App\Models\Grupa;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grupa::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'naziv' => $this->faker->text(255),
            'vaspitac_id' => \App\Models\User::factory(),
        ];
    }
}
