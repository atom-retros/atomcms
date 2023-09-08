<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (config('habbo.migrations.rename_tables') && Schema::hasTable('website_rule_categories')) {
            Schema::rename('website_rule_categories', sprintf('website_rule_categories_%s', time()));
        }

        Schema::create('website_rule_categories', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('description');
            $table->string('badge');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_rule_categories');
    }
};
