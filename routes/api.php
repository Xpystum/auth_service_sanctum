<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\TestController;
use App\Modules\Auth\App\Data\Drivers\AuthSanctum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\RequestGuard;

// Route::get('/user', function (Request $request) {
//     $email = 'test@example.com';
//     $password = '123456';
//     dd(auth());

//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user2', TestController::class);
