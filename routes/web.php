<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SertifikatController;

Route::get('/', [DashboardController::class, 'index']);

Route::prefix('sertifikat')->group(function () {
    Route::get('/', [SertifikatController::class, 'index']);
    Route::get('/create', [SertifikatController::class, 'create']);
    Route::post('/', [SertifikatController::class, 'store']);
});
