<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        dropForeignKeyIfExists('website_rules', 'category_id');

        if (config('habbo.migrations.rename_tables') && Schema::hasTable('website_rules')) {
            Schema::rename('website_rules', sprintf('website_rules_%s', time()));
        }

        Schema::create('website_rules', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('paragraph', 8);
            $table->text('rule');

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('website_rule_categories')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_rules');
    }
};
