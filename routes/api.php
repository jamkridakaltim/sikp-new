<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SikpController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/sertifikat', [SikpController::class, 'sertifikat']);
Route::post('/klaim', [SikpController::class, 'klaim']);
