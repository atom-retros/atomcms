<?php

use App\Http\Controllers\Housekeeping\DashboardController;

Route::prefix('housekeeping')->middleware('permission:housekeeping_access')->group(function () {
    Route::get('/dashboard', DashboardController::class);
});
