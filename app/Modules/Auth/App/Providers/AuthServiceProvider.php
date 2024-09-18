<?php
namespace App\Modules\Auth\App\Providers;

use App\Modules\Auth\App\Data\Drivers\AuthSanctum;
use App\Modules\Auth\Common\Config\AuthConfig;
use App\Modules\Auth\Domain\Services\AuthService;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Foundation\Application;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->app->scoped(AuthSanctum::class, function (Application $app) {
            return new AuthSanctum(AuthConfig::make());
        });

        $this->app->scoped(AuthService::class, function (Application $app) {
            return new AuthService($app->make(AuthSanctum::class));
        });

    }
}
