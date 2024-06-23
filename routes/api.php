<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

Route::middleware(['auth:api', 'role:admin,member'])->get('/users', [UserController::class, 'index']);
Route::middleware(['auth:api', 'role:admin,member'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:api', 'role:admin,member'])->group(function () {
    Route::apiResource('schedules', App\Http\Controllers\Api\ScheduleController::class);
    Route::apiResource('jenis_pekerjaan', App\Http\Controllers\Api\JenisPekerjaanController::class);
    Route::apiResource('lokasi', App\Http\Controllers\Api\LokasiController::class);
    Route::post('/listjadwal', [App\Http\Controllers\Api\ScheduleController::class, 'listJadwal']);
    Route::post('/schedule/detail', [App\Http\Controllers\Api\ScheduleController::class, 'detailJadwal']);
});
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::post('/roles', [RoleController::class, 'store']);
    Route::post('/users/{user}/roles', [RoleController::class, 'assignRole']);
});
