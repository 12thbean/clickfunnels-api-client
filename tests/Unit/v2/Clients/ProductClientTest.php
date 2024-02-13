<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductTags\ProductListTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductClientInterface;

final class ProductClientTest extends ClientTestCase
{
    private ProductClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = app(ProductClient::class, $this->clientData);
    }

    public function testGetList(): void
    {
        $expectedList = ProductListTestData::getList();
        $expectedCount = count($expectedList);

        Http::fake([
            '*/products*' => Http::response($expectedList),
        ]);

        $products = $this->client->getList();
        $this->assertCount($expectedCount, $products);
    }
}
