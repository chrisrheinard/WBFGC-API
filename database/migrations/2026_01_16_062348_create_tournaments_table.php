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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('state'); // 0 = Pending, 1 = Ongoing, 2 = Completed
            $table->string('name');
            $table->string('url')->unique();
            $table->unsignedTinyInteger('tournament_type'); // 1 = Single Elim, 2 = Double Elim
            $table->foreignId('game_id')->constrained();
            $table->boolean('is_public')->default(false);
            $table->text('description')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
