<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('website_permissions', function (Blueprint $table) {
            Schema::table('website_permissions', function (Blueprint $table) {
                $table->renameColumn('key', 'permission');
                $table->renameColumn('value', 'min_rank');
                $table->renameColumn('comment', 'description');
            });

            DB::table('website_permissions')->truncate();
        });
    }

    public function down()
    {
        Schema::table('website_permissions', function (Blueprint $table) {
            //
        });
    }
};