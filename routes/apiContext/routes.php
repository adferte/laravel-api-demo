<?php

use Illuminate\Support\Facades\Route;

Route::name('user')
    ->prefix('user')
    ->group(__DIR__ . '/user/routes.php');

Route::name('pokemon')
    ->prefix('pokemon')
    ->group(__DIR__ . '/pokemon/routes.php');

Route::name('type')
    ->prefix('type')
    ->group(__DIR__ . '/type/routes.php');
