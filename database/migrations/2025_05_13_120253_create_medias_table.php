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
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('disk', 20);
            $table->string('collection', 30);
            $table->string('path', 255);
            $table->string('type', 20);
            $table->unsignedInteger('size');
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
        Schema::dropIfExists('medias');
    }
};
