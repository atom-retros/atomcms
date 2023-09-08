<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (columnExists('users', 'hidden_staff')) {
                Schema::dropColumns('users', 'hidden_staff');
            }

            $table->boolean('hidden_staff')->after('rank')->default(false);
        });
    }
};
