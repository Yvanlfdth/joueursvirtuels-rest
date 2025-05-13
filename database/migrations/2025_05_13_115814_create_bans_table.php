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
        Schema::create('bans', function (Blueprint $table) {
            $table->id();
            $table->text('reason');
            $table->dateTime('date');
            $table->morphs('model');   // Ban requested on: posts, article_comments
            $table->foreignId('banned_user_id')->index()->constrained('users');
            $table->foreignId('banned_by_user_id')->index()->constrained('users');
            $table->foreignId('ban_duration_id')->index()->constrained('ban_durations');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bans');
    }
};
