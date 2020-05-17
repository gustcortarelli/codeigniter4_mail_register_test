<?php

namespace App\Libraries;

use CodeIgniter\API\ResponseTrait;

/**
 * Helper of HTTP status codes
 */
abstract class HttpStatus {
    const CREATED = 201;
    const SUCCESS = 200;
    const DELETED = 200;
    const UPDATED = 200;
    const FAILLURE = 400;
    const NO_CONTENT = 400;
    const INVALID_REQUEST = 400;
    const INSUPPURTED_RESPONSE_TYPE = 400;
    const INVALID_SCOPE = 400;
    const TEMPORARILY_UNAVAILABLE = 400;
    const INVALID_GRANT = 400;
    const INVALID_CREDENTIALS = 400;
    const INVALID_REFRESH = 400;
    const NO_DATA = 400;
    const INVALID_DATA = 400;
    const ACCESS_DENIED = 401;
    const UNAUTHORIZED = 401;
    const INVALID_CLIENT = 401;
    const FORBIDDEN = 403;
    const RESOURCE_NOT_FOUND = 404;
    const NOT_ACCEPTABLE = 406;
    const RESOURCE_EXISTS = 409;
    const CONFLICT = 409;
    const RESOURCE_GONE = 410;
    const PAYLOAD_TOO_LARGE = 413;
    const UNSUPPORTED_MEDIA_TYPE = 415;
    const TOO_MANY_REQUESTS = 429;
    const SERVER_ERROR = 500;
    const UNSUPPORTED_GRANT_TYPE = 501;
    const NOT_IMPLEMENTED = 501;
}