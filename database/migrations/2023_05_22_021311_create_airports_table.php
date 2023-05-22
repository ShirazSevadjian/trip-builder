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
        Schema::create('airports', function (Blueprint $table) {
            $table->id(); // Airport id (primary key)
            $table->string('iata'); // Airport iata code, ex: 'YUL'
            $table->string('name'); // Airport name, ex: 'Pierre Elliott Trudeau International'
            $table->integer('city_code')->constrained(table: 'city_codes', indexName: 'id'); // Foreign key to the city_codes.id. Example city code: 'YMQ'
            $table->integer('country_code')->constrained(table: 'country_codes', indexName: 'id');; // Foreign key to country_code.id. Example country code: 'CA'
            $table->integer('region_code')->constrained(table: 'region_codes', indexName: 'id');; // Foreign key to region_code.id. Example region code: 'QC'
            $table->decimal('latitude', $precision = 8, $scale = 2); // latitude: ##.###### ex: '45.457714'
            $table->decimal('longitude', $precision = 9, $scale = 6); // longitude: ###.###### ex: '-73.749908'
            $table->integer('timezone')->constrained(table: 'timezones', indexName: 'id');; // Foreign ket to timezone.id. Example timezone: 'America/Montreal'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
