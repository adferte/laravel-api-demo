<?php

use App\Http\Controllers\PokeApiContext\Type\GetTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', GetTypeController::class);
