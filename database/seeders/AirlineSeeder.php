<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Airline;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 20 airlines that have 2 flights each
        Airline::factory()
            ->count(20)
            ->hasFlights(2)
            ->create();

        // Generate 10 airlines that have 1 flight each
        Airline::factory()
            ->count(10)
            ->hasFlights(1)
            ->create();

        // Generate 20 airlines that have 3 flights each
        Airline::factory()
            ->count(20)
            ->hasFlights(3)
            ->create();

        // Generate 5 airlines with no flights
        Airline::factory()
            ->count(5)
            ->create();
    }
}
