<?php

declare(strict_types=1);

use App\Http\Controllers\CafesIndexController;
use App\Http\Controllers\CafesNearestController;
use App\Http\Controllers\CafesRandomController;
use App\Http\Controllers\CafesSearchController;
use App\Http\Controllers\CafesShowController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(static function (): void {
    Route::name('cafes.')->group(static function (): void {
        Route::prefix('/cafes')->group(static function (): void {
            Route::get('/', CafesIndexController::class)->name('index');
            Route::get('/random', CafesRandomController::class)->name('random');
            Route::get('/search', CafesSearchController::class)->name('search');
            Route::get('/nearest', CafesNearestController::class)->name('nearest');
            Route::get('/{cafe}', CafesShowController::class)->name('cafe');
        });
    });
});
