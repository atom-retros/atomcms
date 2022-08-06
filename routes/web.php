<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\ReferralController;
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
    Route::get('/me', [MeController::class, 'show'])->name('me.show');

    Route::prefix('community')->group(function () {
        Route::get('/', [MeController::class, 'index'])->name('community.index');
        Route::get('/claim/referral-reward', ReferralController::class)->name('claim.referral-reward');

        Route::get('/articles', [ArticleController::class, 'index'])->name('article.index')->withoutMiddleware('auth');
        Route::get('/article/{article:slug}', [ArticleController::class, 'show'])->name('article.show')->withoutMiddleware('auth');
    });
});

// TODO: Replace auth with Laravel Fortify
require __DIR__.'/auth.php';