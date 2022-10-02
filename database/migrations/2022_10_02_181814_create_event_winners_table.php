<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('event_winners', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->unsignedBigInteger('entry_id');
            $table->enum('type', ['rotw', 'cotw'])->default('rotw');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('entry_id')->references('id')->on('event_entries')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_winners');
    }
};