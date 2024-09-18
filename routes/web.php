<?php

use App\Modules\Auth\App\Data\Drivers\AuthSanctum;
use App\Modules\Auth\App\Data\DTO\UserAttemptDTO;
use App\Modules\Auth\Domain\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function (Request $request) {

    $serv = app(AuthSanctum::class);

    dd($serv);

    $email = 'test@example.com';
    $phone = "79200648827";
    $password = '123456';


    dd($serv->attemptUser(
        UserAttemptDTO::make(
            password: $password,
            email: $email,
            phone: $phone,
        )
    ));

});


