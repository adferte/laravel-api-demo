<?php

use App\Http\Controllers\AuthController;
use App\PokeAPI\Controllers\PokemonController;
use App\PokeAPI\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('pokemon', [PokemonController::class, 'get']);
    Route::get('types', [TypeController::class, 'get']);
});
