<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\RequestGuard;

Route::get('/user', function (Request $request) {
    $email = 'test@example.com';
    $password = '123456';
    dd(auth());

    return $request->user();
})->middleware('auth:sanctum');
