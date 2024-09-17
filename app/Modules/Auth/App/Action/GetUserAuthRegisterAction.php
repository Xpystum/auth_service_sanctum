<?php

namespace App\Modules\Auth\App\Action;

use App\Modules\Auth\App\Action\Base\AbstractAuthAction;

class GetUserAuthRegisterAction extends AbstractAuthAction
{
    public function run()
    {
        return $this->authMethod->userIsRegister();
    }

}
