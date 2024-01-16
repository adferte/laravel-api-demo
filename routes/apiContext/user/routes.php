<?php

use App\Http\Controllers\PokeApiContext\User\CreateUserController;
use Illuminate\Support\Facades\Route;

Route::post('/', CreateUserController::class);
