<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Fulfillment\ListTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Fulfillment\TestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\FulfillmentClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\FulfillmentClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment\CreateFulfillmentDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment\FulfillmentDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment\InvoiceLineItemAttributesDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment\UpdateFulfillmentDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\FulfillmentStatus;

class FulfillmentClientTest extends ClientTestCase
{
    private FulfillmentClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new FulfillmentClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $expectedResponse = ListTestData::list();
        $expectedCount = count($expectedResponse);

        Http::fake(['fulfillments' => Http::response($expectedResponse)]);

        $fulfillments = $this->client->getList();
        $this->assertCount($expectedCount, $fulfillments);
        $this->assertInstanceOf(FulfillmentDTO::class, $fulfillments[0]);
    }

    public function testGetById(): void
    {
        $expectedResponse = TestData::fulfillment();

        Http::fake(['fulfillments/*' => Http::response($expectedResponse)]);

        $fulfillment = $this->client->getById(1);

        $this->assertEquals($expectedResponse['id'], $fulfillment->id);
        $this->assertEquals($expectedResponse['contact_id'], $fulfillment->contactId);
        $this->assertEquals($expectedResponse['status'], $fulfillment->status->value);
        $this->assertEquals($expectedResponse['location_id'], $fulfillment->locationId);
    }

    public function testCreate(): void
    {
        $expectedResponse = TestData::fulfillment();

        $payload = new CreateFulfillmentDTO(
            contactId: 1,
            locationId: 1,
            includedOrdersInvoicesLineItemsAttributes: [
                new InvoiceLineItemAttributesDTO(
                    invoicesLineItemId: 1,
                    quantity: 2,
                ),
            ],
            ignoreOutOfStock: false,
            notifyCustomer: false,
            trackingUrl: 'test1',
            shippingProvider: 'provider',
            trackingCode: 'test1',
        );

        Http::fake(['fulfillments' => Http::response($expectedResponse)]);

        $fulfillment = $this->client->create($payload);

        $this->assertEquals($payload->contactId, $fulfillment->contactId);
        $this->assertEquals($payload->locationId, $fulfillment->locationId);
        $this->assertEquals(FulfillmentStatus::Fulfilled->value, $fulfillment->status->value);
        $this->assertEquals($payload->trackingUrl, $fulfillment->trackingUrl);
        $this->assertEquals($payload->shippingProvider, $fulfillment->shippingProvider);
        $this->assertEquals($payload->trackingCode, $fulfillment->trackingCode);
    }

    public function testUpdate(): void
    {
        $expectedResponse = TestData::fulfillment();

        $payload = new UpdateFulfillmentDTO(
            trackingUrl: 'test1',
            shippingProvider: 'provider',
            trackingCode: 'test1',
            notifyCustomer: false,
        );

        Http::fake(['fulfillments/*' => Http::response($expectedResponse)]);

        $fulfillment = $this->client->update(1, $payload);

        $this->assertEquals($payload->trackingUrl, $fulfillment->trackingUrl);
        $this->assertEquals($payload->shippingProvider, $fulfillment->shippingProvider);
        $this->assertEquals($payload->trackingCode, $fulfillment->trackingCode);
    }

    public function testCancel(): void
    {
        $expectedResponse = TestData::fulfillment();

        Http::fake(['fulfillments/*/cancel' => Http::response($expectedResponse)]);

        $fulfillment = $this->client->cancel(1);
        $this->assertEquals($expectedResponse['id'], $fulfillment->id);
    }
}
