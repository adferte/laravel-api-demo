<?php

use App\Http\Controllers\LoginController;
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

Route::post('login', LoginController::class)->name('login');

Route::middleware('auth:sanctum')->group(function () {

    // ApiContext
    Route::name('apiContext')
        ->group(__DIR__ . '/apiContext/routes.php');
});
