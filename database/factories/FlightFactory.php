<?php

namespace Database\Factories;

use App\Models\Airline;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'airline_id' => Airline::factory(),
            'number' => $this->faker->regexify('/^[0-9]{3}$/'),
            'departure_airport' => Airline::factory(),
            'departure_time' => $this->faker->dateTimeBetween('now', '+2 years'),
            'arrival_airport' => Airline::factory(),
            'arrival_time' => $this->faker->dateTimeBetween('now', '+2 years'),
            'price' => $this->faker->numberBetween(100, 5000)
        ];
    }
}
