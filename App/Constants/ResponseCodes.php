<?php

namespace App\Constants;

/**
 * Class ResponseCodes
 * @author Akinwunmi Taiwo <taiwo@cottacush.com>
 * @package App\Library
 */
class ResponseCodes
{
    const METHOD_NOT_IMPLEMENTED = 'E001';
    const INTERNAL_SERVER_ERROR = 'E002';
    const UNEXPECTED_ERROR = 'E003';
    const AUTH_ERROR = 'E004';
    const AUTH_ACCESS_TOKEN_REQUIRED = 'E005';
    const INVALID_AUTHENTICATION_DETAILS  = 'E006';
    const INVALID_PARAMETERS = 'E007';
    const USER_REGISTRATION_ERROR = 'E008';
    const RECORD_NOT_FOUND = 'E009';
}