<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductVariants\VariantListTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductVariants\VariantTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductVariantClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductVariantClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant\CreateProductVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant\ProductVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant\UpdateProductVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\Products\ProductType;
use Zendrop\ClickFunnelsApiClient\v2\Enum\Products\WeightUnit;

final class ProductVariantClientTest extends ClientTestCase
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
        $this->assertEquals($expectedResponse['product_id'], $variant->productId);
    }

    public function testCreate(): void
    {
        $productId = 9134;
        $expectedResponse = VariantTestData::variant(productId: $productId);

        Http::fake(['*/products/*/variants*' => Http::response($expectedResponse)]);

        $variant = $this->client->create(
            productId: $productId,
            payload: new CreateProductVariantDTO(
                name: $expectedResponse['name'],
                weightUnit: 'lb',
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
            payload: new UpdateProductVariantDTO(
                name: $expectedResponse['name'],
                productType: ProductType::PHYSICAL,
                weightUnit: WeightUnit::LB,
                height: $expectedResponse['height'],
                width: $expectedResponse['width'],
                length: $expectedResponse['length'],
            ),
        );
        $this->assertEquals($expectedResponse['id'], $variant->id);
        $this->assertEquals($expectedResponse['product_id'], $variant->productId);
        $this->assertEquals($expectedResponse['height'], $variant->height);
        $this->assertEquals($expectedResponse['width'], $variant->width);
        $this->assertEquals($expectedResponse['length'], $variant->length);
    }
}
