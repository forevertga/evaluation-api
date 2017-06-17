<?php

namespace App\Model;

use App\Constants\MigrationConstants;
use App\Library\Util;
use Phalcon\Http\Request;

/**
 * Class UserLoginHistory
 * @author Akinwunmi Taiwo <taiwo@cottacush.com>
 * @package App\Model
 */
class UserLoginHistory extends BaseModel
{
    const FAILED_LOGIN_STATUS = 'failed';
    const SUCCESSFUL_LOGIN_STATUS = 'successful';

    public function initialize()
    {
        $this->setSource(MigrationConstants::TABLE_USER_LOGIN_HISTORY);
    }

    /**
     * @author Akinwunmi Taiwo <taiwo@cottacush.com>
     * @param $username
     * @param $reasonForFailure
     * @param Request $request
     * @return mixed
     */
    public static function logFailedLogin($username, $reasonForFailure, Request $request)
    {
        return self::add(
            array_merge(
                self::getLoginData($username, $request),
                [
                    'login_status' => self::FAILED_LOGIN_STATUS,
                    'comment' => $reasonForFailure,
                ]
            )
        );
    }

    /**
     * @author Akinwunmi Taiwo <taiwo@cottacush.com>
     * @param $username
     * @param Request $request
     * @return mixed
     */
    public static function logSuccessfulLogin($username, Request $request)
    {
        return self::add(
            array_merge(
                self::getLoginData($username, $request),
                [
                    'login_status' => self::SUCCESSFUL_LOGIN_STATUS
                ]
            )
        );
    }

    public static function getLoginData($username, Request $request)
    {
        return [
            'user' => $username,
            'login_time' => Util::getCurrentDateTime(),
            'user_agent' => $request->getUserAgent(),
            'ip_address' => $request->getClientAddress()
        ];
    }
}
