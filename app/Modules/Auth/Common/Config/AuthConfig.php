<?php
namespace App\Modules\Auth\Common\Config;


class AuthConfig
{

    public function __construct(

        public string $guard,

        public string $UrlExpiresConfig,

    ) { }

}
