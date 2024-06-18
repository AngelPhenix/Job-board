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
        Schema::create('fish_listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(\App\Models\Spot::class);
        });

        Schema::create('spot_poisson', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Spot::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Fish::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poissons');
        Schema::dropIfExists('spot_poisson');
    }
};
