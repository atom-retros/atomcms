<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BannedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NitroController;
use App\Http\Controllers\PasswordSettingsController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', LocaleController::class)->name('language.select');

Route::middleware(['maintenance', 'check-ban'])->group(function () {
    // Maintenance route
    Route::get('/maintenance', MaintenanceController::class)->name('maintenance.show');

    // Banned route
    Route::get('/banned', BannedController::class)->name('banned.show');

    Route::middleware('guest')->group(function () {
        Route::get('/', HomeController::class)->name('welcome');

        Route::get('/register/{username}/{referral_code}', [RegisteredUserController::class, 'create'])->name('register.referral');
    });

    Route::middleware('auth')->group(function () {
        Route::prefix('user')->group(function () {
            // User routes
            Route::get('/me', [MeController::class, 'show'])->name('me.show');

            Route::prefix('settings')->group(function () {
                Route::get('/account', [AccountSettingsController::class, 'edit'])->name('settings.account.show');
                Route::put('/account', [AccountSettingsController::class, 'update'])->name('settings.account.update');
                Route::get('/password', [PasswordSettingsController::class, 'edit'])->name('settings.password.show');
                Route::put('/password', [PasswordSettingsController::class, 'update'])->name('settings.password.update');
            });
        });

        // Profiles
        Route::get('/profile/{user:username}', ProfileController::class)->name('profile.show');

        // Community routes
        Route::prefix('community')->group(function () {
            Route::get('/', [MeController::class, 'index'])->name('community.index');
            Route::get('/claim/referral-reward', ReferralController::class)->name('claim.referral-reward');

            Route::withoutMiddleware('auth')->group(function () {
                Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
                Route::get('/article/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
                Route::get('/staff', StaffController::class)->name('staff.index');
            });
        });

        // Create a leaderboard route with leaderboard controller
        Route::get('/leaderboard', LeaderboardController::class)->name('leaderboard.index');

        // Rules routes
        Route::view('/rules', 'rules')->name('rules.index')->withoutMiddleware('auth');

        //Shop routes
        Route::get('/shop', ShopController::class)->name('shop.index');

        // Game route
        Route::prefix('game')->middleware('findretros.redirect')->group(function () {
            Route::get('/nitro', NitroController::class)->name('nitro-client');
        });
    });

    require __DIR__.'/auth.php';
});


