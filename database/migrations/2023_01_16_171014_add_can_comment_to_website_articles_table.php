<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('website_articles', function (Blueprint $table) {
            $table->boolean('can_comment')->default(true)->after('image');
        });
    }

    public function down()
    {
        Schema::table('website_articles', function (Blueprint $table) {
            //
        });
    }
};
