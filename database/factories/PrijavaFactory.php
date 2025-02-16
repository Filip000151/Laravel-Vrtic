<?php

namespace Database\Factories;

use App\Models\Prijava;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrijavaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prijava::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ime_dete' => $this->faker->text(255),
            'prezime_dete' => $this->faker->text(255),
            'datum_rodjenja' => $this->faker->date(),
            'jmbg_dete' => $this->faker->text(255),
            'ime_roditelj' => $this->faker->text(255),
            'prezime_roditelj' => $this->faker->text(255),
            'broj_telefona' => $this->faker->text(255),
            'jmbg_roditelj' => $this->faker->text(255),
            'napomene' => $this->faker->text(),
            'datum_prijave' => $this->faker->date(),
            'status' => $this->faker->word(),
            'administrator_id' => \App\Models\User::factory(),
        ];
    }
}
