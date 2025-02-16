<?php

namespace Database\Factories;

use App\Models\Evidencija;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvidencijaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evidencija::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datum' => $this->faker->date(),
            'grupa_id' => \App\Models\Grupa::factory(),
        ];
    }
}
