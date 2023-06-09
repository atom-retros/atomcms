<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('website_help_center_ticket_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('position')->default(1);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_help_center_ticket_categories');
    }
};
