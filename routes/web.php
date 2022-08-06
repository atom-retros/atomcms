<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\PasswordSettingsController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\StaffController;
use App\Models\WebsiteArticle;
use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', LocaleController::class)->name('language.select');

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('index', [
            'articles' => WebsiteArticle::query()->latest('id')->take(4)->with('user:id,username,look')->get()
        ]);
    })->name('welcome');

    Route::get('/register/{username}/{referral_code}', [RegisteredUserController::class, 'create'])->name('register.referral');
});

Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/me', [MeController::class, 'show'])->name('me.show');

        Route::prefix('settings')->group(function () {
            Route::get('/account', [AccountSettingsController::class, 'edit'])->name('settings.account.show');
            Route::put('/account', [AccountSettingsController::class, 'update'])->name('settings.account.update');
            Route::get('/password', [PasswordSettingsController::class, 'edit'])->name('settings.password.show');
            Route::put('/password', [PasswordSettingsController::class, 'update'])->name('settings.password.update');
        });
    });

    Route::prefix('community')->group(function () {
        Route::get('/', [MeController::class, 'index'])->name('community.index');
        Route::get('/claim/referral-reward', ReferralController::class)->name('claim.referral-reward');

        Route::withoutMiddleware('auth')->group(function () {
            Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
            Route::get('/article/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
            Route::get('/staff', StaffController::class)->name('staff.index');
        });

    });
});

// TODO: Replace auth with Laravel Fortify
require __DIR__.'/auth.php';