<?php

namespace Database\Factories;

use App\Models\Roditelj;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoditeljFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Roditelj::class;

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
            'broj_telefona' => $this->faker->numerify('##########'),
            'jmbg' => $this->faker->unique->numerify('#############'),
        ];
    }
}
