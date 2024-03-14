<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\v2\Clients\WebhookClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\WebhookClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\CreateEndpointDTO;

class WebhookClientTest extends ClientTestCase
{
    private WebhookClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new WebhookClient(...$this->clientData);
    }

    public function testCreateEndpoint(): void
    {
        $jsonResponse = <<<JSON
            {
                "id": 1,
                "workspace_id": 1,
                "url": "fake_url",
                "name": "Product created",
                "event_type_ids": [
                    "product.created"
                ],
                "created_at": "2024-03-14T10:43:55.390Z",
                "updated_at": "2024-03-14T10:43:55.390Z"
            }
JSON;
        $expectedData = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);

        $payload = new CreateEndpointDTO(
            url: 'fake_url',
            name: 'Product created',
            eventTypeIds: ['product.created'],
        );

        Http::fake([
            '*/webhooks/outgoing/endpoints' => Http::response($expectedData),
        ]);

        $endpoint = $this->client->createEndpoint($payload);

        $this->assertEquals($payload->url, $endpoint->url);
        $this->assertEquals($payload->name, $endpoint->name);
        $this->assertEquals($payload->eventTypeIds, $endpoint->eventTypeIds);
    }
}
