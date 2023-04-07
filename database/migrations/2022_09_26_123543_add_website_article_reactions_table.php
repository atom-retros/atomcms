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
        dropForeignKeyIfExists('website_article_reactions', 'article_id');

        if (config('habbo.migrations.rename_tables') && Schema::hasTable('website_article_reactions')) {
            Schema::rename('website_article_reactions', sprintf('website_article_reactions_%s', time()));
        }

        Schema::create('website_article_reactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('article_id');
            $table->string('reaction', 50);
            $table->boolean('active')->default(true);
            $table->foreign('article_id')->references('id')->on('website_articles')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_article_reactions');
    }
};
