<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (config('habbo.migrations.rename_tables') && Schema::hasTable('website_beta_codes')) {
            Schema::rename('website_beta_codes', sprintf('website_beta_codes_%s', time()));
        }

        Schema::create('website_beta_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_beta_codes');
    }
};
