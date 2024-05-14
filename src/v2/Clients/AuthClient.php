<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Auth\AccessTokenDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Auth\AccessTokenRequestDTO;

class AuthClient extends AbstractClient implements AuthClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAccessToken(string $url, AccessTokenRequestDTO $payload): AccessTokenDTO
    {
        $response = $this->sendUnauthorizedRequest(
            url: $url,
            method: HttpMethod::POST,
            payload: $payload->toArray(),
        );

        return AccessTokenDTO::fromResponse($response->json());
    }
}
