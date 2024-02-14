<?php

namespace Zendrop\ClickFunnelsApiClient;

enum ApiVersion: string
{
    case V2 = 'v2';

    public static function latest(): self
    {
        return self::V2;
    }
}
