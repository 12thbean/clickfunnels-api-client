<?php

namespace Zendrop\ClickFunnelsApiClient\Http\Packs;

enum HttpMethod: string
{
    case GET = 'get';
    case POST = 'post';
    case PUT = 'put';
    case DELETE = 'delete';
}
