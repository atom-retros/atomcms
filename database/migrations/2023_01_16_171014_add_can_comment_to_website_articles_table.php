<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_articles', function (Blueprint $table) {
            if (columnExists('website_articles', 'can_comment')) {
                Schema::dropColumns('website_articles', 'can_comment');
            }

            $table->boolean('can_comment')->default(true)->after('image');
        });
    }
};
