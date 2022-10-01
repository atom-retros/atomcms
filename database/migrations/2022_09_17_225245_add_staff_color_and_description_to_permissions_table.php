<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('job_description')->default('Here to help')->after('badge');
            $table->string('staff_color', 8)->default('#327fa8')->after('job_description');
        });
    }

    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            //
        });
    }
};