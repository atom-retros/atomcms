<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (config('habbo.migrations.rename_tables') && Schema::hasTable('website_permissions')) {
            Schema::rename('website_permissions', sprintf('website_permissions_%s', time()));
        }

        Schema::create('website_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('value')->nullable();
            $table->string('comment')->comment('Explanation on what the permission is used for')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_permissions');
    }
};