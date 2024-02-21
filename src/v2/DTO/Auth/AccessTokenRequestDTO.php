<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Auth;

use Zendrop\ClickFunnelsApiClient\v2\DTO\RequestDTO;

class AccessTokenRequestDTO extends RequestDTO
{
    public function __construct(
        public readonly string $code,
        public readonly string $clientId,
        public readonly string $clientSecret,
        public readonly string $grantType,
        public readonly string $redirectUri,
    ) {
    }
}
