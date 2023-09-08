<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_articles', function (Blueprint $table) {
            if (columnExists('website_articles', 'deleted_at')) {
                Schema::dropColumns('website_articles', 'deleted_at');
            }

            $table->softDeletes()->after('updated_at');
        });
    }
};
