<?php

namespace App\Validation;

use PhalconUtils\Validation\BaseValidation;

/**
 * Class UserAuthenticationValidation
 * @author Akinwunmi Taiwo <taiwo@cottacush.com>
 * @package App\Validation
 */
class UserAuthenticationValidation extends BaseValidation
{
    /**
     * validations setups
     */
    public function initialize()
    {
        $this->setRequiredFields(['username', 'password']);
    }
}
