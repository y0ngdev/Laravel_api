<?php

use App\Http\Controllers\Api\V1\Auth;
use App\Http\Controllers\Api\V1\VehicleController;
use App\Http\Controllers\Api\V1\ZoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('auth/register', [Auth\AuthController::class, 'register']);
Route::post('auth/login', [Auth\AuthController::class, 'login'])->name('login');

Route::get('zones', [ZoneController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [Auth\ProfileController::class, 'show']);
    Route::put('profile', [Auth\ProfileController::class, 'update']);
    Route::put('password', Auth\PasswordUpdateController::class);
    Route::get('auth/logout', [Auth\AuthController::class, 'logout']);
    Route::apiResource('vehicles', VehicleController::class);
});
