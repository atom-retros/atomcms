<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users_currency', function (Blueprint $table) {
            $table->dropPrimary();
        });
    }

    public function down()
    {
        Schema::table('users_currency', function (Blueprint $table) {
            //
        });
    }
};