<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\ApiClient\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Clients\ProductClient;
use Zendrop\ClickFunnelsApiClient\Clients\ProductClientInterface;
use Zendrop\ClickFunnelsApiClient\Tests\ApiClient\TestCase;
use Zendrop\ClickFunnelsApiClient\Tests\TestData\ProductTags\ProductListTestData;

final class ProductClientTest extends TestCase
{
    private ProductClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = app(ProductClient::class, [
            'accessToken' => env('TEST_ACCESS_TOKEN'),
            'storeUrl' => env('TEST_STORE_URL'),
            'workspace' => env('TEST_WORKSPACE'),
        ]);
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
