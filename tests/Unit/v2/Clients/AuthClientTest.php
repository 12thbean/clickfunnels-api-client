<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\v2\Clients\AuthClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\AuthClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Auth\AccessTokenRequestDTO;

class AuthClientTest extends ClientTestCase
{
    private AuthClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new AuthClient(...$this->clientData);
    }

    public function testGetAccessToken(): void
    {
        $jsonResponse = <<<JSON
        {
            "access_token": "Fpcao0my_IJbojM5XElF4uMUw7RDuVR6tnhAoZu0yLQ",
            "token_type": "Bearer",
            "expires_in": 7200,
            "scope": "admin read",
            "created_at": 1708551462,
            "team_id": 1691,
            "team_name": "Zendrop",
            "workspace_id": 1718,
            "workspace_name": "Zendrop Development",
            "workspace_url": "https://myworkspace0b2f2.myclickfunnelsrelease.com"
        }
JSON;
        $expectedData = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);

        $payload = new AccessTokenRequestDTO(
            code: 'fake_code',
            clientId: 'fake_client_id',
            clientSecret: 'fake_secret',
            grantType: 'authorization_code',
            redirectUri: 'https://app.local.zendrop.io/api/click-funnels/auth',
        );

        Http::fake([
            '*/oauth/token*' => Http::response($expectedData),
        ]);

        $accessToken = $this->client->getAccessToken($payload);

        $this->assertCount(10, $accessToken->toArray());
    }
}
