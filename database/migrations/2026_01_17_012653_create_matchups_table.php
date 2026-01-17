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
        Schema::create('matchups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained()->restrictOnDelete();
            $table->unsignedTinyInteger('state'); // 0 = Pending, 1 = Ongoing, 2 = Completed
            $table->unsignedTinyInteger('bracket_round');
            $table->unsignedTinyInteger('best_of');
            $table->foreignId('winner_player_id')->nullable()->constrained('players')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matchups');
    }
};
