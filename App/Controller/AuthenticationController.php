<?php

namespace App\Controller;

use App\Constants\ResponseCodes;
use App\Library\Util;
use App\Model\User;
use App\Validation\UserAuthenticationValidation;
use App\Validation\UserRegistrationValidation;
use Phalcon\Config;

/**
 * Class AuthenticationController
 * @author Akinwunmi Taiwo <taiwo@cottacush.com>
 * @property Config config
 * @package App\Controller
 */
class AuthenticationController extends BaseController
{
    /**
     * @author Akinwunmi Taiwo <taiwo@cottacush.com>
     * @return mixed|void
     */
    public function authenticate()
    {
        $postData = $this->getPostData();
        $validation = new UserAuthenticationValidation($postData);

        if (!$validation->validate()) {
            return $this->sendBadRequestResponse($validation->getMessages());
        }

        $user = (new User())->authenticate($postData->username, $postData->password);

        return $this->response->sendSuccess(
            array_merge(
                $user->toArray()
            )
        );
    }

    /**
     * Handles User registration
     * @author Akinwunmi Taiwo <taiwo@cottacush.com>
     * @return mixed|void
     */
    public function register()
    {
        $this->db->begin();
        $postData = $this->getPostData();
        $validation = new UserRegistrationValidation($postData);

        if (!$validation->validate()) {
            return $this->sendBadRequestResponse($validation->getMessages());
        }

        $postData->updated_at = Util::getCurrentDateTime();
        $postData->password = Util::encryptPassword($postData->password);

        /** @var User $user */

        $user = User::add($postData);

        if (!$user) {
            $this->db->rollback();
            return $this->sendServerErrorResponse(User::getLastErrorMessage());
        }

        $this->db->commit();

        return $this->response->sendSuccess(
            array_merge(
                $user->toArray()
            )
        );
    }
}
