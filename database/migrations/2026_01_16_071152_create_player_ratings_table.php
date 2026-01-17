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
        Schema::create('player_ratings', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('player_id')->constrained()->cascadeOnDelete();
            $table->foreignId('game_id')->constrained();
        
            $table->decimal('rating', 6, 2)->default(1500.00);
            $table->decimal('rating_deviation', 6, 2)->default(350.00);
            $table->decimal('volatility', 8, 6)->default(0.060000);
        
            $table->timestamps();
        
            $table->unique(['player_id', 'game_id']);
            $table->index(['game_id', 'rating']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_ratings');
    }
};
