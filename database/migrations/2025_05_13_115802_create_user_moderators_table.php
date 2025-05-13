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
        Schema::create('user_moderators', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_begin');
            $table->dateTime('date_end')->nullable();
            $table->text('reason_end')->nullable();
            $table->morphs('model');   // Users as moderators for: forums, articles (general, no model_id in that case)
            $table->foreignId('user_id')->index()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_moderators');
    }
};
