<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        dropForeignKeyIfExists('website_article_comments', 'article_id');
        dropForeignKeyIfExists('website_article_comments', 'user_id');

        if (config('habbo.migrations.rename_tables') && Schema::hasTable('website_article_comments')) {
            Schema::rename('website_article_comments', sprintf('website_article_comments_%s', time()));
        }

        Schema::create('website_article_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id');
            $table->integer('user_id');
            $table->string('comment');
            $table->timestamps();

            $table->foreign('article_id')->references('id')->on('website_articles')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_article_comments');
    }
};
