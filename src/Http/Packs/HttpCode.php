<?php

namespace Zendrop\ClickFunnelsApiClient\Http\Packs;

enum HttpCode: int
{
    case HTTP_OK = 200;
    case HTTP_NO_CONTENT = 204;
    case BAD_REQUEST = 400;
    case HTTP_UNAUTHORIZED = 401;
    case HTTP_FORBIDDEN = 403;
    case HTTP_NOT_FOUND = 404;
    case HTTP_CONFLICT_REQUEST = 409;
    case HTTP_VALIDATION_ERROR = 422;
}
