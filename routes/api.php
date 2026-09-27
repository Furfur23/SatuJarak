<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Auth Routes
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (Butuh Token Sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // Route Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Route untuk mengambil data user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Contoh Route Khusus Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return response()->json(['message' => 'Selamat datang di Dashboard Admin']);
        });
    });

    // Contoh Route Khusus Pemohon
    Route::middleware('role:pemohon')->group(function () {
        Route::get('/pemohon/status', function () {
            return response()->json(['message' => 'Status pengajuan pemohon']);
        });
    });
});
