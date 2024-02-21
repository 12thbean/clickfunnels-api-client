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
    public function getAccessToken(AccessTokenRequestDTO $payload): AccessTokenDTO
    {
        $response = $this->sendRequest(
            resource: '',
            method: HttpMethod::POST,
            payload: $payload->toArray(),
            customUrl: 'https://accounts.myclickfunnelsrelease.com/oauth/token',
        );

        return AccessTokenDTO::fromResponse($response->json());
    }
}
