<?php

declare(strict_types=1);

use App\Http\Controllers\CafesIndexController;
use App\Http\Controllers\CafesRandomController;
use App\Http\Controllers\CafesShowController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(static function (): void {
    Route::prefix('/cafes')->group(static function (): void {
        Route::get('/', CafesIndexController::class);
        Route::get('/random', CafesRandomController::class);
        Route::get('/{cafe}', CafesShowController::class);
    });
});
