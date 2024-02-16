<?php

namespace Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients\ClientTestCase;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductVariants\VariantListTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductVariants\VariantTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductVariantClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductVariantClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariants\CreateVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariants\ProductVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariants\UpdateVariantDTO;

class ProductVariantClientTest extends ClientTestCase
{
    private ProductVariantClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new ProductVariantClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $productId = 9187;
        $expectedResponse = VariantListTestData::list(productId: $productId);
        $expectedCount = count($expectedResponse);

        Http::fake(['*/products/*/variants*' => Http::response($expectedResponse)]);

        $variants = $this->client->getList($productId);
        $this->assertCount($expectedCount, $variants);
        $this->assertInstanceOf(ProductVariantDTO::class, $variants[0]);
    }

    public function testGetById(): void
    {
        $variantId = 16061;
        $expectedResponse = VariantTestData::variant(id: $variantId);

        Http::fake(['*/products/variants/*' => Http::response($expectedResponse)]);

        $variant = $this->client->getById(id: $variantId);
        $this->assertEquals($variantId, $variant->id);
        $this->assertEquals($expectedResponse['name'], $variant->name);
        $this->assertEquals($expectedResponse['product_id'], $variant->product_id);
    }

    public function testCreate(): void
    {
        $productId = 9134;
        $expectedResponse = VariantTestData::variant(productId: $productId);

        Http::fake(['*/products/*/variants*' => Http::response($expectedResponse)]);

        $variant = $this->client->create(
            productId: $productId,
            payload: new CreateVariantDTO(
                name: $expectedResponse['name'],
                weight_unit: 'lb',
                height: $expectedResponse['height'],
                width: $expectedResponse['width'],
                length: $expectedResponse['length'],
            ),
        );
        $this->assertEquals($expectedResponse['id'], $variant->id);
        $this->assertEquals($expectedResponse['name'], $variant->name);
        $this->assertEquals($expectedResponse['product_id'], $productId);
        $this->assertEquals($expectedResponse['height'], $variant->height);
        $this->assertEquals($expectedResponse['width'], $variant->width);
        $this->assertEquals($expectedResponse['length'], $variant->length);
    }

    public function testUpdate(): void
    {
        $variantId = 16081;
        $expectedResponse = VariantTestData::variant(id: $variantId);

        Http::fake(['*/products/variants/*' => Http::response($expectedResponse)]);

        $variant = $this->client->update(
            id: $variantId,
            payload: new UpdateVariantDTO(
                name: $expectedResponse['name'],
                weight_unit: 'lb',
                height: $expectedResponse['height'],
                width: $expectedResponse['width'],
                length: $expectedResponse['length'],
            ),
        );
        $this->assertEquals($expectedResponse['id'], $variant->id);
        $this->assertEquals($expectedResponse['product_id'], $variant->product_id);
        $this->assertEquals($expectedResponse['height'], $variant->height);
        $this->assertEquals($expectedResponse['width'], $variant->width);
        $this->assertEquals($expectedResponse['length'], $variant->length);
    }
}
