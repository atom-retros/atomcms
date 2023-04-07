<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        dropForeignKeyIfExists('website_articles', 'user_id');

        if (Schema::hasColumn('website_articles', 'user_id')) {
            Schema::dropColumns('website_articles', 'user_id');
        }

        Schema::table('website_articles', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }
};
