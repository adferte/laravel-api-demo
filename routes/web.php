<?php

use App\PokeAPI\Controllers\PokemonController;
use App\PokeAPI\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('pokemon', [PokemonController::class, 'get']);
    Route::get('types', [TypeController::class, 'get']);
});
