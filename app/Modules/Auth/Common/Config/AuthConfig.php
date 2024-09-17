<?php
namespace App\Modules\Auth\Common\Config;


class AuthConfig
{

    public function __construct(

        public string $guard,

        public string $UrlExpiresConfig,

    ) { }

    public static function make(string $guard = 'sanctum', $UrlExpiresConfig = '360') : self
    {
        return new self(
            guard: $guard,
            UrlExpiresConfig: $UrlExpiresConfig,
        );
    }

}
