<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('website_help_center_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable()->default(1);
            $table->text('content');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('website_help_center_categories')->cascadeOnDelete();
            $table->foreign('status_id')->references('id')->on('website_help_center_ticket_statuses')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_help_center_tickets');
    }
};
