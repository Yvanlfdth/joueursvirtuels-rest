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
        Schema::create('article_page_comments', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->dateTime('deleted_date')->nullable();
            $table->text('deleted_reason')->nullable();
            $table->foreignId('deleted_by_user_id')->nullable()->index()->constrained('users');
            $table->foreignId('article_page_id')->index()->constrained('article_pages');
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
        Schema::dropIfExists('article_page_comments');
    }
};
