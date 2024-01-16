<?php

use App\Http\Controllers\PokeApiContext\User\CreateUserController;
use App\Http\Controllers\PokeApiContext\User\GetCurrentUserController;
use Illuminate\Support\Facades\Route;

Route::post('/', CreateUserController::class);
Route::get('/me', GetCurrentUserController::class);
