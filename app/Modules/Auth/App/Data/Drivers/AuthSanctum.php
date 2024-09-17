<?php

namespace App\Modules\Auth\App\Data\Drivers;

use App\Modules\Auth\App\Data\DTO\BaseDTO;
use App\Modules\Auth\Common\Config\AuthConfig;
use App\Modules\Auth\Domain\Interface\AuthInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthSanctum implements AuthInterface
{
    public function __construct(
        private ?AuthConfig $config
    ) { }

    public function attemptUser(BaseDTO $data)
    {

    }

    public function loginUser(Model $model)
    {

    }

    public function isLogin(BaseDTO $data)
    {

    }

    public function user()
    {

    }

    public function logout()
    {

    }

    public function refresh()
    {

    }

    public function respondWithToken(string $token)
    {

    }

    public function userIsRegister()
    {

    }

    public function respondWithToken(string $token) : ?array
    {

        $data = [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => config($this->config->UrlExpiresConfig) * 60,
        ];

        return $data;

    }

    private function checkUserAuth(array $credentials) : bool|array
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Создание токена
            $token = $user->createToken('Ваш токен')->plainTextToken;

            // Возврат ответа с токеном и данными пользователя
            return response()->json([
                'token' => $token,
                'user' => $user,
            ]);
        }
        return $this->respondWithToken($token);
    }
}
