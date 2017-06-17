<?php
namespace App\Controller;

use App\Constants\HttpStatusCodes;
use App\Constants\ResponseCodes;
use App\Constants\StatusConstants;
use App\Library\Response;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Resultset;
use stdClass;

/**
 * Class BaseController
 * @author Akinwunmi Taiwo <taiwo@cottacush.com>
 * @package App\Controller
 * @property Response $response
 */
class BaseController extends Controller
{
    /**
     * Get json raw body data
     * @param bool|false $assoc
     * @return array|bool|stdClass
     */
    public function getPostData($assoc = false)
    {
        $postData = $this->request->getJsonRawBody($assoc);

        if (!is_object($postData) && !$assoc) {
            return new stdClass();
        }

        if (!is_array($postData) && $assoc) {
            return [];
        }

        return $postData;
    }

    /**
     * Get the raw data body
     * @return array|stdClass|string
     */
    public function getRawData()
    {
        $rawData = $this->request->getRawBody();

        if (!is_object($rawData)) {
            return new stdClass();
        }

        if (!is_array($rawData)) {
            return [];
        }

        return $rawData;
    }

    /**
     * @param null $message
     * @return mixed
     */
    public function sendBadRequestResponse($message = null)
    {
        return $this->response->sendError(
            ResponseCodes::INVALID_PARAMETERS,
            HttpStatusCodes::BAD_REQUEST_CODE,
            $message
        );
    }

    /**
     * @param null $message
     * @param string $responseCode
     * @return mixed
     */
    public function sendServerErrorResponse($message = null, $responseCode = ResponseCodes::UNEXPECTED_ERROR)
    {
        return $this->response->sendError(
            $responseCode,
            HttpStatusCodes::INTERNAL_SERVER_ERROR_CODE,
            $message
        );
    }

    /**
     * @param string $responseCode
     * @param null $message
     * @return mixed
     */
    public function sendNotFoundResponse($message = null, $responseCode = ResponseCodes::RECORD_NOT_FOUND)
    {
        return $this->response->sendError(
            $responseCode,
            HttpStatusCodes::NOT_FOUND_CODE,
            $message
        );
    }
}
