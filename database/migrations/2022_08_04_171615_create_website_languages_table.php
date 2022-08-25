<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (config('habbo.migrations.rename_tables') && Schema::hasTable('website_languages')) {
            Schema::rename('website_languages', sprintf('website_languages_%s', time()));
        }

        Schema::create('website_languages', function (Blueprint $table) {
            $table->id();
            $table->string('country_code', 8)->unique();
            $table->string('language')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_languages');
    }
};