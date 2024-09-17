<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function (Request $request) {

    $email = 'test@example.com';
    $password = '123456';

    dd(Auth::attempt(compact( 'email', 'password' )));

    // if (Auth::attempt(compact($email, $password))) {
    //     $user = Auth::user();

    //     // Создание токена
    //     $token = $user->createToken('Ваш токен')->plainTextToken;

    //     // Возврат ответа с токеном и данными пользователя
    //     return response()->json([
    //         'token' => $token,
    //         'user' => $user,
    //     ]);
    // }

});
