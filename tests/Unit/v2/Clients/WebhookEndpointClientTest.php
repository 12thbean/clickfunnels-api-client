<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\WebhookEndpoints\WebhookEndpointListTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\WebhookEndpoints\WebhookEndpointTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\WebhookEndpointClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\WebhookEndpointClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\CreateEndpointDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\EndpointDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\UpdateEndpointDTO;

class WebhookEndpointClientTest extends ClientTestCase
{
    private WebhookEndpointClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new WebhookEndpointClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $expectedResponse = WebhookEndpointListTestData::list();
        $expectedCount = count($expectedResponse);

        Http::fake(['/webhooks/outgoing/endpoints' => Http::response($expectedResponse)]);

        $webhookEndpoints = $this->client->getList();
        $this->assertCount($expectedCount, $webhookEndpoints);
        $this->assertInstanceOf(EndpointDTO::class, $webhookEndpoints[0]);
    }

    public function testGetById(): void
    {
        $expectedResponse = WebhookEndpointTestData::webhookEndpoint();
        Http::fake([
            '/webhooks/outgoing/endpoints/*' => Http::response($expectedResponse),
        ]);

        $webhookEndpoint = $this->client->getById(1);
        $this->assertInstanceOf(EndpointDTO::class, $webhookEndpoint);
    }

    public function testCreate(): void
    {
        $expectedResponse = WebhookEndpointTestData::webhookEndpoint();

        $payload = new CreateEndpointDTO(
            url: 'fake_url',
            name: 'Product created',
            eventTypeIds: ['product.created'],
        );

        Http::fake([
            '/webhooks/outgoing/endpoints' => Http::response($expectedResponse),
        ]);

        $endpoint = $this->client->create($payload);

        $this->assertEquals($payload->url, $endpoint->url);
        $this->assertEquals($payload->name, $endpoint->name);
        $this->assertEquals($payload->eventTypeIds, $endpoint->eventTypeIds);
    }

    public function testUpdate(): void
    {
        $expectedResponse = WebhookEndpointTestData::webhookEndpoint();

        $payload = new UpdateEndpointDTO(
            url: 'fake_url',
            name: 'Product created',
            eventTypeIds: ['product.created'],
        );

        Http::fake([
            '/webhooks/outgoing/endpoints/*' => Http::response($expectedResponse),
        ]);

        $endpoint = $this->client->update(1, $payload);

        $this->assertEquals($payload->url, $endpoint->url);
        $this->assertEquals($payload->name, $endpoint->name);
        $this->assertEquals($payload->eventTypeIds, $endpoint->eventTypeIds);
    }
}
