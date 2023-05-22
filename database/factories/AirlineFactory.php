<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Airline>
 */
class AirlineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $fake_iata_1 = $this->faker->regexify('/[A-Z]{2}/');
        $fake_iata_2 = $this->faker->regexify('/[A-Z]\d/');
        $fake_iata_3 = $this->faker->regexify('/\d[A-Z]/');

        $iata = $this->faker->randomElement([$fake_iata_1, $fake_iata_2, $fake_iata_3]);
        $name = 'Air ' . $this->faker->country(); 

        return [
            'iata' => $iata,
            'name' => $name
        ];
    }
}
