<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            if (Schema::hasColumn('permissions', 'hidden_rank')) {
                Schema::dropColumns('permissions', 'hidden_rank');
            }

            $table->boolean('hidden_rank')->after('rank_name')->default(false);
        });
    }

    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
        });
    }
};