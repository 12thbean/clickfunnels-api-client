<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductPrices\PriceListTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductPrices\PriceTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductPriceClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductPriceClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductPriceDTO;

class ProductPriceClientTest extends ClientTestCase
{
    private ProductPriceClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new ProductPriceClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $expectedResponse = PriceListTestData::list();
        $expectedCount = count($expectedResponse);

        Http::fake(['/products/*/prices' => Http::response($expectedResponse)]);

        $productPrices = $this->client->getList(9135);
        $this->assertCount($expectedCount, $productPrices);
        $this->assertInstanceOf(ProductPriceDTO::class, $productPrices[0]);
    }

    public function testGetById(): void
    {
        $expectedResponse = PriceTestData::price();
        Http::fake(['/products/prices/*' => Http::response($expectedResponse)]);

        $productPrice = $this->client->getById(10631);
        $this->assertInstanceOf(ProductPriceDTO::class, $productPrice);
    }

    public function testCreate(): void
    {
        $payload = new ProductPriceDTO(
            amount: '29.00',
            currency: 'USD',
            duration: 0,
            interval: '',
            trial_interval: '',
            trial_duration: '',
            interval_count: 0,
            trial_amount: '',
            name: 'Special Price',
        );

        $expectedResponse = PriceTestData::price();
        Http::fake(['/products/*/prices' => Http::response($expectedResponse)]);

        $productPrice = $this->client->create(9132, $payload);
        $this->assertInstanceOf(ProductPriceDTO::class, $productPrice);
    }
}
