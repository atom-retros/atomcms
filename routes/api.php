<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvatarController;

Route::get('avatars', AvatarController::class)
    ->name('avatars.search');
