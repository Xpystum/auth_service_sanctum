<?php

use App\Modules\Auth\App\Data\Drivers\AuthSanctum;
use App\Modules\Auth\App\Data\DTO\UserAttemptDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function (Request $request) {

    $serv = app(AuthSanctum::class);
    $email = 'test@example.com';
    $password = '123456';


    dd($serv->attemptUser(
        UserAttemptDTO::make(
            password: $password,
            email: $email,
        )
    ));

});


