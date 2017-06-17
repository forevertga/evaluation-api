<?php

namespace App\Validation;

use PhalconUtils\Validation\BaseValidation;

class TokenAuthenticationValidation extends BaseValidation
{
    /**
     * validations setups
     */
    public function initialize()
    {
        $this->setRequiredFields(['username', 'password']);
    }
}
