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
        Schema::create('city_codes', function (Blueprint $table) {
            $table->id(); // Unique ID
            $table->string('code'); // City code, ex: 'YMQ'
            $table->string('city_name'); // City name, ex: 'Montreal'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_codes');
    }
};
