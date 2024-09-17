<?php

namespace App\Http\Controllers;

use App\Modules\Auth\App\Data\Drivers\AuthSanctum;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke(AuthSanctum $serv)
    {
        dd($serv->user());
    }
}
