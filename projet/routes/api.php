<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PPDController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('progress', [PPDController::class, 'index']);
Route::post('progress', [PPDController::class, 'store']);
Route::get('progress/{PPD}', [PPDController::class, 'show']);
Route::put('progress/{PPD}', [PPDController::class, 'update']);
Route::delete('progress/{PPD}', [PPDController::class, 'destroy']);
