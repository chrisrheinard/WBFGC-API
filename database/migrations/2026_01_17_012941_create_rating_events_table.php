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
        Schema::create('rating_events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('player_id')->constrained()->cascadeOnDelete();
            $table->foreignId('game_id')->constrained();
            $table->foreignId('matchup_id')->constrained();

            $table->decimal('rating_delta', 6, 2);
            $table->decimal('rd_delta', 6, 2);
            $table->decimal('volatility_delta', 8, 6);

            $table->boolean('is_valid')->default(true);
            $table->timestamp('applied_at')->nullable();

            $table->timestamps();

            $table->unique(['player_id', 'matchup_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_events');
    }
};
