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
        Schema::create('game_details', function (Blueprint $table) {
            $table->id();
            $table->morphs('model');   // Game details: game_mods, game_kinds, developers, editors, consoles
            $table->foreignId('game_id')->index()->constrained('games');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_details');
    }
};
