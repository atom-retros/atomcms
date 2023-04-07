<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            if (columnExists('permissions', 'job_description')) {
                Schema::dropColumns('permissions', 'job_description');
            }

            if (columnExists('permissions', 'staff_color')) {
                Schema::dropColumns('permissions', 'staff_color');
            }

            $table->string('job_description')->default('Here to help')->after('badge');
            $table->string('staff_color', 8)->default('#327fa8')->after('job_description');
        });
    }
};
