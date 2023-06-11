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

            $table->string('name')->unique();
            $table->string('info');
            $table->string('icon');
            $table->string('color');
            $table->unsignedInteger('costs');
            $table->unsignedInteger('give_rank')->nullable();
            $table->unsignedInteger('credits')->nullable();
            $table->unsignedInteger('duckets')->nullable();
            $table->unsignedInteger('diamonds')->nullable();
            $table->string('badges')->nullable();
            $table->json('furniture')->nullable();
            $table->unsignedInteger('position')->default(0);

            $table->timestamps();

            $table->foreign('give_rank')->references('id')->on('permissions')->nullOnDelete();
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
