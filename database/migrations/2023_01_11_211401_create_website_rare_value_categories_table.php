<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (config('habbo.migrations.rename_tables') && Schema::hasTable('website_rare_value_categories')) {
            Schema::rename('website_rare_value_categories', sprintf('website_rare_value_categories_%s', time()));
        }

        Schema::create('website_rare_value_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('badge');
            $table->unsignedInteger('priority')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_rare_value_categories');
    }
};
