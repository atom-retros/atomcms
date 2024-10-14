<?php

use Atom\Core\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Broadcast\AuthController;
use Illuminate\Support\Facades\Broadcast;

Route::post('/broadcasting/auth', AuthController::class);

Broadcast::channel('session.{sso}', fn (User $user, string $sso) => $user->auth_ticket === $sso);

Broadcast::channel('room.{room}', fn (User $user, string $room) => true);