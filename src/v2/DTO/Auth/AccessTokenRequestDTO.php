<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Auth;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class AccessTokenRequestDTO extends BaseDTO
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
