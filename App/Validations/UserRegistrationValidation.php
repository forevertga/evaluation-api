<?php

namespace App\Validation;

use App\Model\User;
use PhalconUtils\Validation\BaseValidation;
use PhalconUtils\Validation\Validators\NotExisting;

/**
 * Class UserRegistrationValidation
 * @author Akinwunmi Taiwo <taiwo@cottacush.com>
 * @package App\Validation
 */
class UserRegistrationValidation extends BaseValidation
{
    public function initialize()
    {
        $this->setRequiredFields(['first_name', 'last_name', 'username', 'password']);

        $this->add('username', new NotExisting([
            'model' => User::class,
            'conditions' => 'username=:username:',
            'bind' => ['username' => $this->getValue('username')],
            'message' => 'username already exists'
        ]));
    }
}
