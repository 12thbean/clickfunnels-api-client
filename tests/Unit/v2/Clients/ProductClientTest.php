<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Products\ProductListTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Products\ProductTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\CreateProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\UpdateProductDTO;

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
        $expectedList = ProductListTestData::getList();
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
            visible_in_store: true,
            visible_in_customer_center: true,
            seo_title: 'Test Product',
            fields: ['name', 'visible_in_store', 'visible_in_customer_center', 'seo_title', 'seo_description'],
        );

        Http::fake([
            '*/products' => Http::response(ProductTestData::product(
                name: $payload->name,
                visibleInStore: $payload->visible_in_store,
                seoTitle: $payload->seo_title,
            )),
        ]);

        $product = $this->client->create($payload);
        $this->assertEquals($payload->name, $product->name);
        $this->assertEquals($payload->visible_in_store, $product->visible_in_store);
        $this->assertEquals($payload->seo_title, $product->seo_title);
    }

    public function testUpdate(): void
    {
        $productId = 9138;

        $payload = new UpdateProductDTO(
            name: 'Test',
            visible_in_store: true,
            visible_in_customer_center: true,
            seo_title: 'Test Product',
            fields: ['name', 'visible_in_store', 'visible_in_customer_center', 'seo_title', 'seo_description'],
        );

        Http::fake([
            '*/products*' => Http::response(ProductTestData::product(
                id: $productId,
                name: $payload->name,
                visibleInStore: $payload->visible_in_store,
                visibleInCustomerCenter: $payload->visible_in_customer_center,
                seoTitle: $payload->seo_title,
            )),
        ]);

        $product = $this->client->update($productId, $payload);
        $this->assertEquals($payload->name, $product->name);
        $this->assertEquals($payload->visible_in_store, $product->visible_in_store);
        $this->assertEquals($payload->visible_in_customer_center, $product->visible_in_customer_center);
    }
}
