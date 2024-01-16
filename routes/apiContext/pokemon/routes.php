<?php

use App\Http\Controllers\PokeApiContext\Pokemon\GetPokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/', GetPokemonController::class);
