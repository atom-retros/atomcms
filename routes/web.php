<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('welcome');

Route::get('/language/{locale}', LocaleController::class)->name('language.select');


Route::middleware('auth')->group(function () {
    Route::get('/home', [MeController::class, 'show'])->name('me.show');
    Route::get('/community', [MeController::class, 'index'])->name('community.index');
});


require __DIR__.'/auth.php';