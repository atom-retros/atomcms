<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MeController;
use App\Models\WebsiteArticle;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'article' => WebsiteArticle::query()->latest()->with('user:id,username,look')->first()
    ]);
})->name('welcome');

Route::get('/language/{locale}', LocaleController::class)->name('language.select');


Route::middleware('auth')->group(function () {
    Route::get('/home', [MeController::class, 'show'])->name('me.show');

    Route::prefix('community')->group(function () {
        Route::get('/', [MeController::class, 'index'])->name('community.index');

        Route::get('/article/{article:slug}', [ArticleController::class, 'show'])->name('article.show')->withoutMiddleware('auth');
    });
});


require __DIR__.'/auth.php';