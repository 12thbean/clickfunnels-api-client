<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Throwable;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Auth\AccessTokenDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Auth\AccessTokenRequestDTO;

interface AuthClientInterface
{
    /**
     * Exchange code with access token
     *
     * @throws Throwable
     * @link https://developers.myclickfunnels.com/docs/oauth-20#token-step
     */
    public function getAccessToken(string $url, AccessTokenRequestDTO $payload): AccessTokenDTO;
}
