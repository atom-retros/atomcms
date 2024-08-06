<?php

use Illuminate\Support\Str;
use Atom\Core\Models\Permission;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->json('admin_permissions')
                ->nullable()
                ->after('hidden_rank');
        });

        $resources = collect(File::files(app_path('Nova')))
            ->map(fn ($file) => pathinfo($file, PATHINFO_FILENAME))
            ->filter(fn (string $resource) => $resource !== 'Resource')
            ->mapWithKeys(fn (string $resource) => [sprintf('App\Nova\%s', $resource) => true])
            ->toArray();

        Permission::whereNull('admin_permissions')
            ->update(['admin_permissions' => $resources]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('admin_permissions');
        });
    }
};
