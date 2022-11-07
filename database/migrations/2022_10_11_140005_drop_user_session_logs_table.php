<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users_session_logs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('users_session_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('user_id');
            $table->string('ip', 100)->default('0');
            $table->text('browser')->nullable();

            $table->timestamps();
        });
    }
};
