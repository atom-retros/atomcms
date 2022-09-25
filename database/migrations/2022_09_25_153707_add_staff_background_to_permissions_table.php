<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('staff_background')->default('staff-bg.png')->after('staff_color');
        });
    }

    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
        });
    }
};