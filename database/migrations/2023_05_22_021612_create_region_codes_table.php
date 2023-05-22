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
        Schema::create('region_codes', function (Blueprint $table) {
            $table->id(); // Unique ID
            $table->string('code'); // Region Code, ex: 'QC' (AKA State/Province)
            $table->string('name'); // Region Name, ex: 'Quebec'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('region_codes');
    }
};
