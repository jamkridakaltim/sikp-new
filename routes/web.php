<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SertifikatController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/sertifikat', [SertifikatController::class, 'index']);
