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
        Schema::create('website_shop_articles', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('info');
            $table->string('icon');
            $table->string('color');
            $table->integer('costs');
            $table->integer('credits')->nullable();
            $table->integer('duckets')->nullable();
            $table->integer('diamonds')->nullable();
            $table->string('badges')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_shop_articles');
    }
};
