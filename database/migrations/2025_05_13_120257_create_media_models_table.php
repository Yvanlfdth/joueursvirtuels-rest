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
        Schema::create('media_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('order')->nullable();   // Used for galeries
            $table->morphs('model');    // Media related to any content: games (jacket), articles, galeries, consoles, ...
            $table->string('submodel_type', 20)->nullable();  // Determines the type and location of the media according to the model: eg. "small_logo" for console is like a favicon, "medium_logo" is 120*120px logo
            $table->string('position', 20)->nullable(); // Sets the position of the media if present in an article. Detemines where the media should be shown
            $table->foreignId('media_id')->index()->constrained('medias');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_models');
    }
};
