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
        Schema::create('fish_spot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fish_id')->constrained('fish_listings')->cascadeOnDelete();
            $table->foreignId('spot_id')->constrained('spots')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish_spot');
    }
};
