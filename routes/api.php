<?php

use App\Http\Controllers\Api\MahasiswaController;
use Illuminate\Support\Facades\Route;

// Endpoint ini bisa diakses oleh 'admin' dan 'viewer'
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show']);
});

// Endpoint ini HANYA bisa diakses oleh 'admin'
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
    Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy']);
});