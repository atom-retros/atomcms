<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_permissions', function (Blueprint $table) {
            DB::table('website_permissions')->truncate();

            if (Schema::hasColumn('website_permissions', 'key')) {
                $table->renameColumn('key', 'permission');
            }

            if (Schema::hasColumn('website_permissions', 'value')) {
                $table->renameColumn('value', 'min_rank');
            }

            if (Schema::hasColumn('website_permissions', 'comment')) {
                $table->renameColumn('comment', 'description');
            }
        });
    }
};
