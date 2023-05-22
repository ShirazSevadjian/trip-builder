<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id(); // Unique id (primary key)
            $table->integer('airline')->constrained(table: 'airlines', indexName: 'id'); // Foreign key of Airlines table
            $table->integer('number'); // Flight number, ex: 301
            $table->integer('departure_airport')->constrained(table: 'airports', indexName: 'id'); // Departure airport, ex: 'YUL'. Foreign key of airports.iata 
            $table->time('departure_time'); // Time of departure, ex: '07:35'
            $table->integer('arrival_airport')->constrained(table: 'airports', indexName: 'id');; // Arrival airport code, ex: 'YVR'. Foreign ket of airports.iata
            $table->time('arrival_time'); // Arrival time of the flight, ex: '19:11'
            $table->double('price'); // Price of the flight ticket
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
