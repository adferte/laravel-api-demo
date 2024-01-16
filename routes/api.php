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

    //Route::get('/me', GetCurrentUserController::class);

    // TODO
    //  Acabar /me
    //  Modificar el proceso que carga los datos de la API y pasarlo a DDD
    //  Meter tests
    //  Comprobar endpoints y ficheros modificados
    //  Comprobar que se lanza bien desde cero
    //  Preparar GitHub y enviar por mail el proyecto

    // ApiContext
    Route::name('apiContext')
        ->prefix('pokeApi')
        ->group(__DIR__ . '/apiContext/routes.php');
});
