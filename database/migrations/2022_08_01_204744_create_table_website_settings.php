<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (config('habbo.migrations.rename_tables') && Schema::hasTable('website_settings')) {
            Schema::rename('website_settings', sprintf('website_settings_%s', time()));
        }

        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('value');
            $table->string('comment')->comment('Add an explanation of the setting does');
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
};