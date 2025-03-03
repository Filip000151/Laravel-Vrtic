<?php

namespace Database\Factories;

use App\Models\Dete;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dete::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ime' => $this->faker->text(255),
            'prezime' => $this->faker->text(255),
            'datum_rodjenja' => $this->faker->date(),
            'napomene' => $this->faker->text(),
            'jmbg' => $this->faker->unique->numerify('#############'),
            'roditelj_id' => \App\Models\Roditelj::factory(),
            'grupa_id' => \App\Models\Grupa::factory(),
        ];
    }
}
