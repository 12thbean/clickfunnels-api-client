<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\FulfillmentLocations\ListTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\FulfillmentLocations\TestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\FulfillmentLocationClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\FulfillmentLocationClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation\CreateFulfillmentLocationDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation\FulfillmentLocationDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation\UpdateFulfillmentLocationDTO;

class FulfillmentLocationClientTest extends ClientTestCase
{
    private FulfillmentLocationClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new FulfillmentLocationClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $expectedResponse = ListTestData::list();
        $expectedCount = count($expectedResponse);

        Http::fake(['fulfillments/locations' => Http::response($expectedResponse)]);

        $fulfillmentLocations = $this->client->getList();
        $this->assertCount($expectedCount, $fulfillmentLocations);
        $this->assertInstanceOf(FulfillmentLocationDTO::class, $fulfillmentLocations[0]);
    }

    public function testGetById(): void
    {
        $expectedResponse = TestData::fulfillmentLocation();

        Http::fake(['fulfillments/locations/*' => Http::response($expectedResponse)]);

        $fulfillmentLocation = $this->client->getById(1);
        $this->assertInstanceOf(FulfillmentLocationDTO::class, $fulfillmentLocation);

        $this->assertEquals($expectedResponse['id'], $fulfillmentLocation->id);
        $this->assertEquals($expectedResponse['name'], $fulfillmentLocation->name);
        $this->assertEquals($expectedResponse['address_name'], $fulfillmentLocation->addressName);
        $this->assertEquals($expectedResponse['email_address'], $fulfillmentLocation->emailAddress);
    }

    public function testCreate(): void
    {
        $expectedResponse = TestData::fulfillmentLocation();

        $payload = new CreateFulfillmentLocationDTO(
            name: 'Default location',
            addressName: 'Test',
            emailAddress: 'test@te.te',
            externalApp: true,
        );

        Http::fake(['fulfillments/locations' => Http::response($expectedResponse)]);

        $fulfillmentLocation = $this->client->create($payload);

        $this->assertEquals($payload->name, $fulfillmentLocation->name);
        $this->assertEquals($payload->addressName, $fulfillmentLocation->addressName);
        $this->assertEquals($payload->emailAddress, $fulfillmentLocation->emailAddress);
        $this->assertEquals($payload->externalApp, $fulfillmentLocation->externalApp);
    }

    public function testUpdate(): void
    {
        $expectedResponse = TestData::fulfillmentLocation();

        $payload = new UpdateFulfillmentLocationDTO(
            name: 'Default location',
            addressName: 'Test',
            emailAddress: 'test@te.te',
            externalApp: true,
        );

        Http::fake(['fulfillments/locations/*' => Http::response($expectedResponse)]);

        $fulfillmentLocation = $this->client->update(1, $payload);

        $this->assertEquals($payload->name, $fulfillmentLocation->name);
        $this->assertEquals($payload->addressName, $fulfillmentLocation->addressName);
        $this->assertEquals($payload->emailAddress, $fulfillmentLocation->emailAddress);
        $this->assertEquals($payload->externalApp, $fulfillmentLocation->externalApp);
    }

    public function testDelete(): void
    {
        Http::fake(['*/fulfillments/locations/*' => Http::response(null, 204)]);

        $result = $this->client->delete(1);
        $this->assertTrue($result);
    }
}
