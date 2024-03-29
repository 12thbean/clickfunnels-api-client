<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Products\ProductListTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Products\ProductTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\CreateProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\UpdateProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\VariantPropertyDTO;

final class ProductClientTest extends ClientTestCase
{
    private ProductClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new ProductClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $expectedList = ProductListTestData::list();
        $expectedCount = count($expectedList);

        Http::fake([
            '*/products*' => Http::response($expectedList),
        ]);

        $products = $this->client->getList();
        $this->assertCount($expectedCount, $products);
    }

    public function testGetById(): void
    {
        $expectedProductData = ProductTestData::product();
        $productId = $expectedProductData['id'];

        Http::fake([
            '*/products/*' => Http::response($expectedProductData),
        ]);

        $product = $this->client->getById($productId);
        $this->assertEquals($productId, $product->id);
        $this->assertEquals($expectedProductData['name'], $product->name);
    }

    public function testCreate(): void
    {
        $payload = new CreateProductDTO(
            name: 'Test',
            visibleInStore: true,
            visibleInCustomerCenter: true,
            seoTitle: 'Test Product',
            variantProperties: [
                new VariantPropertyDTO(name: 'Color'),
            ],
        );

        Http::fake([
            '*/products' => Http::response(ProductTestData::product(
                name: $payload->name,
                visibleInStore: $payload->visibleInStore,
                seoTitle: $payload->seoTitle,
            )),
        ]);

        $product = $this->client->create($payload);
        $this->assertEquals($payload->name, $product->name);
        $this->assertEquals($payload->visibleInStore, $product->visibleInStore);
        $this->assertEquals($payload->seoTitle, $product->seoTitle);
    }

    public function testUpdate(): void
    {
        $productId = 9138;

        $payload = new UpdateProductDTO(
            name: 'Test 2',
            visibleInStore: false,
            visibleInCustomerCenter: false,
            seoTitle: 'Test Product',
            tagIds: [],
        );

        Http::fake([
            '*/products*' => Http::response(ProductTestData::product(
                id: $productId,
                name: $payload->name,
                visibleInStore: $payload->visibleInStore,
                visibleInCustomerCenter: $payload->visibleInCustomerCenter,
                seoTitle: $payload->seoTitle,
            )),
        ]);

        $product = $this->client->update($productId, $payload);
        $this->assertEquals($payload->name, $product->name);
        $this->assertEquals($payload->visibleInStore, $product->visibleInStore);
        $this->assertEquals($payload->visibleInCustomerCenter, $product->visibleInCustomerCenter);
    }
}
