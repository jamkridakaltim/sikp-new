<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\KlaimController;

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
