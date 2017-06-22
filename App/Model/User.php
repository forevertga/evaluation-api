<?php

namespace App\Model;

use App\Constants\MigrationConstants;
use App\Constants\ResponseCodes;
use App\Library\Response;
use App\Library\Util;
use Phalcon\Db\Exception;
use Phalcon\Http\Request;


/**
 * Class User
 * @property integer id;
 * @property  string username
 * @property string display_name
 * @property string last_login_time
 * @property string first_name
 * @property string last_name
 * @property string password
 * @author Akinwunmi Taiwo <taiwo@cottacush.com>
 * @package App\Model
 * @property Response $response
 */
class User extends BaseModel
{
    public function initialize()
    {
        $this->setSource(MigrationConstants::TABLE_USERS);
    }

    /**
     * @author Akinwunmi Taiwo <taiwo@cottacush.com>
     * @param $username
     * @param $password
     * @param array $options
     * @return mixed|static
     * @throws Exception
     */
    public function authenticate($username, $password, $options = [])
    {
        /* @var $this */
        $user = User::findFirst([
            "username = :username:",
            'bind' => ['username' => $username]
        ]);

        if($password !== $user->password) {
            throw new Exception('Check the password you provided');
        }

//        if(!Util::verifyPassword($password, $user['password']))
//        {
//            throw new Exception('Check the password you provided');
//        }

        return $user;
    }

    /**
     * @author Akinwunmi Taiwo <taiwo@cottacush.com>
     * @return string
     */
    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * @author Akinwunmi Taiwo <taiwo@cottacush.com>
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @author Akinwunmi Taiwo <taiwo@cottacush.com>
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @author Akinwunmi Taiwo <taiwo@cottacush.com>
     * @return array
     */
    public function getData()
    {
        return $this->toArray();
    }
}
