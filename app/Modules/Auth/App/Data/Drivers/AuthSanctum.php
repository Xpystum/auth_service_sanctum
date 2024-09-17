<?php

namespace App\Modules\Auth\App\Data\Drivers;

use App\Models\User;
use App\Modules\Auth\App\Data\DTO\BaseDTO;
use App\Modules\Auth\Common\Config\AuthConfig;
use App\Modules\Auth\Domain\Interface\AuthInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\PersonalAccessToken;

#TODO ->addMinutes(360) - добавить время истечения
class AuthSanctum implements AuthInterface
{
    private ?AuthConfig $config = null;

    public function __construct() {
        $this->config = AuthConfig::make();
    }

    public function attemptUser(BaseDTO $data)
    {
        return is_null($data) ? false : $this->checkUserAuth($data->toArray());
    }

    /**
     * @param User $model
     * @param string $token_name
     *
     * @return [type]
     */
    public function loginUser(Model $model)
    {
        if(!$model) { return null; }

        /**
        *@var string $token
        */
        $token = $model->createToken($this->getNameTimeToken())->plainTextToken;

        return $this->respondWithToken($token);
    }

    /**
     * Вернуть пользователя по токену (обязательно должен быть middleware auth:sanctum)
     * @return bool|Model
     */
    public function user()
    {

        $user = Request::user();

        return $user ? $user : false;
    }

    /**
    * Удалить токен (обязательно должен быть middleware auth:sanctum)
    * @return bool|Model
    */
    public function logout()
    {

       $status = Request::user()->currentAccessToken()->delete();

       return $status ? true : false;

    }

    public function refresh() : bool|array
    {
        /**
        * @var User
        */
        $user = Request::user();

        // Удаляем старый токен, если он существует
        if ($user->currentAccessToken()) { $user->currentAccessToken()->delete(); }

        // Создаем новый токен
        $newToken = $user->createToken($this->getNameTimeToken())->plainTextToken;

        return $newToken ? $this->respondWithToken($newToken) : false;
    }

    public function respondWithToken(string $token) : ?array
    {

        $data = [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => '666666',
            // 'expires_in' => config($this->config->UrlExpiresConfig) * 60,
        ];

        return $data;

    }

    private function checkUserAuth(array $credentials) : bool|array
    {
        if (Auth::attempt($credentials)) {

            /**
            * @var User
            */
            $user = Auth::user();

            // Создание токена
            $token = $user->createToken($this->getNameTimeToken())->plainTextToken;

            // Возврат ответа с токеном и данными пользователя
            return $this->respondWithToken($token);
        }

        return false;

    }

    private function getNameTimeToken() : string
    {
        return 'Token для авторизации, время создание: ' . now()->format('Y:m:d H:i:s');
    }
}
