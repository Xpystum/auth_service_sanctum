<?php

use App\Http\Controllers\TestController;
use App\Modules\Auth\Presentation\HTTP\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->middleware('auth:sanctum')->group(function () {

    Route::post('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

});


Route::post('auth/login', [AuthController::class, 'login']);

