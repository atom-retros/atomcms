<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('website_open_positions', function (Blueprint $table) {
            $table->id();
            $table->integer('permission_id');
            $table->string('description');
            $table->timestamp('apply_from');
            $table->timestamp('apply_to');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_open_positions');
    }
};