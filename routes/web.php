<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\KlaimController;
use App\Http\Controllers\AuthController;

// login
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth.static')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::prefix('sertifikat')->group(function () {
        Route::get('/', [SertifikatController::class, 'index']);
        Route::get('/create', [SertifikatController::class, 'create']);
        Route::post('/', [SertifikatController::class, 'store']);
    });

    Route::prefix('klaim')->group(function () {
        Route::get('/', [KlaimController::class, 'index']);
        Route::get('/create', [KlaimController::class, 'create']);
        Route::post('/', [KlaimController::class, 'store']);
    });
});
