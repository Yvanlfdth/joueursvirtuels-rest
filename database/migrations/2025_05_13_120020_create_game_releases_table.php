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
        Schema::create('game_releases', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->foreignId('game_id')->index()->constrained('games');
            $table->foreignId('country_id')->index()->constrained('countries');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_releases');
    }
};
